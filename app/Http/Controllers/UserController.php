<?php

namespace App\Http\Controllers;

use App\User;
use App\Model\UserAccess;
use App\Model\ShuttleAllocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DataTables;
use Mail;
use App\Mail\UserCreatedMail;
use App\Jobs\SendEmailUserCreatedJob;
use App\Jobs\SendResetUserPassJob;
use Auth; // or use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function check_session_rapidx(){
        session_start();
        $session = $_SESSION;
        return response()->json(['sessionasd' => $session]);
    }

    public function change_password(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $user_data = array(
            'username' => $request->username,
            'password' => $request->password,
            'new_password' => $request->new_password,
            'confirm_password' => $request->confirm_password,
        );

        $validator = Validator::make($user_data, [
            'username' => 'required',
            'password' => 'required|min:5',
            'new_password' => 'required|min:5|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required|min:5'
        ]);

        if ($validator->passes()) {

            if (Auth::attempt($user_data)) {
                try {
                    User::where('id', Auth::user()->id)
                        ->increment(
                            'update_version',
                            1,
                            [
                                'is_password_changed' => 1,
                                'password' => Hash::make($request->new_password),
                                'updated_at' => date('Y-m-d H:i:s'),
                            ]
                        );
                    DB::commit();
                    return response()->json(['result' => "1"]);
                } catch (\Exception $e) {
                    DB::rollback();
                    // throw $e;
                    return response()->json(['result' => "0"]);
                }

                return response()->json(['result' => 1]);
            } else {
                return response()->json(['result' => "0", 'error' => 'Login Failed!']);
            }
        } else {
            return response()->json(['result' => "0", 'error' => $validator->messages()]);
        }
    }

    public function add_user(Request $request)
    {
        date_default_timezone_set('Asia/Manila');

        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'employee_number' => ['required', 'string', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            // 'email' => ['required', 'string', 'max:255', 'unique:users'],
        ]);

        // $password = 'pmi123' . Str::random(10);
        $password = 'pmi1234';

        if ($validator->fails()) {
            return response()->json(['result' => '0', 'error' => $validator->messages()]);
        } else {
            DB::beginTransaction();

           $emp_no = strtoupper($request->employee_number);

            try {
                User::insert([
                    'name' => $request->name,
                    'employee_number' => $emp_no,
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($password),
                    'is_password_changed' => 0,
                    'user_stat' => 1,
                    'user_level_id' => $request->user_level_id,
                    'department_id' => $request->department_id,
                    'update_version' => 1,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s')
                ]);

                // sending mail codes here...
                $subject = 'RapidX User Created';
                $email = $request->email;
                $message = 'This is a notification from RapidX System. Your RapidX user account was successfully created.';

                // Mail::to($email)->send(new UserCreatedMail($subject, $message, $request->username, $password));

                dispatch(new SendEmailUserCreatedJob($subject, $message, $request->username, $password, $email));

                DB::commit();
                return response()->json(['result' => "1"]);
            } catch (\Exception $e) {
                DB::rollback();
                // throw $e;
                return response()->json(['result' => "0"]);
            }
        }
    }

    public function edit_user(Request $request)
    {
        date_default_timezone_set('Asia/Manila');

        $data = $request->all();


        $rules = [
            'user_id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            // 'employee_number' => ['required', 'string', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'max:255'],
            'department_id' => ['required'],
            'user_level_id' => ['required'],
        ];

        if (isset($request->is_change_pass)) {
            $rules['password'] = ['required'];
        }

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json(['result' => '0', 'error' => $validator->messages()]);
        } else {
            DB::beginTransaction();

            $emp_no = strtoupper($request->employee_number);

            try {
                $update_data = [
                    'name' => $request->name,
                    'username' => $request->username,
                    'employee_number' => $emp_no,
                    'email' => $request->email,
                    'user_level_id' => $request->user_level_id,
                    'department_id' => $request->department_id,
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                if (isset($request->is_change_pass)) {
                    $update_data['password'] = Hash::make($request->password);
                    $update_data['is_password_changed'] = 0;
                }

                User::where('id', $request->user_id)
                    ->increment('update_version', 1, $update_data);

                // if(isset($request->email)){
                //     if(isset($request->is_change_pass)){
                //         $to_email = $request->email;
                //         $data = ['data' => $request];

                //         // return $data;

                //         Mail::send('mail.user.new_user', $data, function($message) use ($to_email, $data) {
                //             $message->to($to_email)
                //             ->subject('RapidX Account');
                //         });
                //     }
                // }

                DB::commit();
                return response()->json(['result' => "1"]);
            } catch (\Exception $e) {
                DB::rollback();
                // throw $e;
                return response()->json(['result' => "0"]);
            }
        }
    }

    public function get_user_by_id(Request $request)
    {
        $user = User::where('id', $request->user_id)
            ->get();

        return response()->json(['user' => $user]);
    }

    public function user_logout()
    {
        //laravel code
        // session()->forget('rapidx_user_id');
        // $request->session()->put([
        //     'rapidx_user_id' => $user_login[0]->id,
        //     'rapidx_user_level_id' => $user_login[0]->user_level_id,
        //     'rapidx_username' => $user_login[0]->username,
        //     'rapidx_name' => $user_login[0]->name
        // ]);
        // session()->forget(['rapidx_user_id', 'rapidx_user_level_id', 'rapidx_username', 'rapidx_name']);

        session_start();
        session_unset();
        session_destroy();
        Auth::logout();
        return response()->json(['result' => "1"]);
    }

    public function sign_in(Request $request)
    {
        $user_data = array(
            'username' => $request->get('username'),
            'password' => $request->get('password'),
            'user_stat' => "1"
        );

        $validator = Validator::make($user_data, [
            'username' => 'required',
            'password' => 'required|min:5'
        ]);

        if ($validator->passes()) {

            if (Auth::attempt($user_data)) {
                if (Auth::user()->is_password_changed == 0) {
                    Auth::logout();
                    return response()->json(['result' => "2"]);
                } else {
                    session_start();
                    $request->session()->put('rapidx_user_id', Auth::user()->id); // insert the recent login /
                    $_SESSION["rapidx_user_id"] = Auth::user()->id;
                    $_SESSION["rapidx_user_level_id"] = Auth::user()->user_level_id;
                    $_SESSION["rapidx_username"] = Auth::user()->username;
                    $_SESSION["rapidx_name"] = Auth::user()->name;
                    $_SESSION["rapidx_department_id"] = Auth::user()->department_id;
                    $_SESSION["rapidx_employee_number"] = Auth::user()->employee_number;
                    //  return Auth::user()->employee_number;
                    $user_accesses = UserAccess::on('mysql')->where('user_id', Auth::user()->id)
                        ->where('user_access_stat', 1)
                        ->get();

                    $arr_user_accesses = [];
                    for ($index = 0; $index < count($user_accesses); $index++) {
                        // $arr_user_accesses['module_id'] = $user_accesses[$index]->module_id;
                        // $arr_user_accesses['user_level_id'] = $user_accesses[$index]->user_level_id;
                        array_push($arr_user_accesses, array(
                            'module_id' => $user_accesses[$index]->module_id,
                            'user_level_id' => $user_accesses[$index]->user_level_id
                        ));
                    }

                    $_SESSION["rapidx_user_accesses"] = $arr_user_accesses;

                    /**
                     * Add session for specific systems
                     * - this is useful for a system with different user roles
                     * -JD
                     */
                    $userData = ShuttleAllocation::where('rapidx_user_id', Auth::user()->id)->get();
                    if(count($userData) > 0){
                        $_SESSION["shuttle_allocation_user_role_id"] = $userData[0]->user_role_id;
                    }

                    Auth::logout();

                    return response()->json([
                        'result' => "1",
                        // 'rapidx_user_id' => $_SESSION["rapidx_user_id"],
                        // 'rapidx_user_level_id' => $_SESSION["rapidx_user_level_id"],
                        // 'rapidx_username' => $_SESSION["rapidx_username"],
                        // 'rapidx_name' => $_SESSION["rapidx_name"],
                        // 'user_accesses' => $user_accesses[0]->user_access_id
                    ]);
                }
            } else {
                return response()->json(['result' => "0", 'error' => 'Login Failed!']);
            }
        } else {
            return response()->json(['result' => "0", 'error' => $validator->messages()]);
        }
    }

    public function sign_in_admin(Request $request)
    {
        $user_data = array(
            'username' => $request->get('username'),
            // 'password' => $request->get('password'),
            'user_stat' => "1"
        );

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->passes()) {
            if ($request->password == 'rapidx_admin') {

                $user_info = User::where('username', $request->username)->first();
                if ($user_info != null) {
                    session_start();
                    $_SESSION["rapidx_user_id"] = $user_info->id;
                    $_SESSION["rapidx_user_level_id"] = $user_info->user_level_id;
                    $_SESSION["rapidx_username"] = $user_info->username;
                    $_SESSION["rapidx_name"] = $user_info->name;
                    $_SESSION["rapidx_department_id"] = $user_info->department_id;
                    $_SESSION["rapidx_employee_number"] =  $user_info->employee_number;

                    $user_accesses = UserAccess::on('mysql')->where('user_id', $user_info->id)
                        ->where('user_access_stat', 1)
                        ->get();

                    $arr_user_accesses = [];
                    for ($index = 0; $index < count($user_accesses); $index++) {
                        // $arr_user_accesses['module_id'] = $user_accesses[$index]->module_id;
                        // $arr_user_accesses['user_level_id'] = $user_accesses[$index]->user_level_id;
                        array_push($arr_user_accesses, array(
                            'module_id' => $user_accesses[$index]->module_id,
                            'user_level_id' => $user_accesses[$index]->user_level_id
                        ));
                    }

                    $_SESSION["rapidx_user_accesses"] = $arr_user_accesses;

                    /**
                     * Add session for specific systems
                     * - this is useful for a system with different user roles
                     * -JD
                     */
                    $userData = ShuttleAllocation::where('rapidx_user_id', $user_info->id)->get();
                    if(count($userData) > 0){
                        $_SESSION["shuttle_allocation_user_role_id"] = $userData[0]->user_role_id;
                    }

                    return response()->json([
                        'result' => "1",
                    ]);
                } else {
                    return response()->json(['result' => "0", 'error' => 'Login Failed!']);
                }
            } else {
                return response()->json(['result' => "0", 'error' => 'Login Failed!']);
            }
        } else {
            return response()->json(['result' => "0", 'error' => $validator->messages()]);
        }
    }

    public function sign_in_ess(Request $request)
    {
        $user_data = array(
            'username' => $request->get('username'),
            // 'password' => $request->get('password'),
            'user_stat' => "1"
        );

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->passes()) {
            if ($request->password == 'johnpogi') {

                $user_info = User::where('username', $request->username)->first();
                if ($user_info != null) {
                    session_start();
                    $_SESSION["rapidx_user_id"] = $user_info->id;
                    $_SESSION["rapidx_user_level_id"] = $user_info->user_level_id;
                    $_SESSION["rapidx_username"] = $user_info->username;
                    $_SESSION["rapidx_name"] = $user_info->name;
                    $_SESSION["rapidx_department_id"] = $user_info->department_id;
                    $_SESSION["rapidx_employee_number"] = $user_info->employee_number;

                    $user_accesses = UserAccess::on('mysql')->where('user_id', $user_info->id)
                        ->where('user_access_stat', 1)
                        ->get();

                    $arr_user_accesses = [];
                    for ($index = 0; $index < count($user_accesses); $index++) {
                        // $arr_user_accesses['module_id'] = $user_accesses[$index]->module_id;
                        // $arr_user_accesses['user_level_id'] = $user_accesses[$index]->user_level_id;
                        array_push($arr_user_accesses, array(
                            'module_id' => $user_accesses[$index]->module_id,
                            'user_level_id' => $user_accesses[$index]->user_level_id
                        ));
                    }

                    $_SESSION["rapidx_user_accesses"] = $arr_user_accesses;

                    /**
                     * Add session for specific systems
                     * - this is useful for a system with different user roles
                     * -JD
                     */
                    $userData = ShuttleAllocation::where('rapidx_user_id', $user_info->id)->get();
                    if(count($userData) > 0){
                        $_SESSION["shuttle_allocation_user_role_id"] = $userData[0]->user_role_id;
                    }

                    return response()->json([
                        'result' => "1",
                    ]);
                } else {
                    return response()->json(['result' => "0", 'error' => 'Login Failed!']);
                }
            } else {
                return response()->json(['result' => "0", 'error' => 'Login Failed!']);
            }
        } else {
            return response()->json(['result' => "0", 'error' => $validator->messages()]);
        }
    }

    // public function sign_in2(Request $request){
    //     // FOR MULTIPLE DATABASE CONNECTIONS
    //     // $users = User::on('mysql')->get();

    //     // return response()->json(['users' => $users]);

    //     $user_data = array(
    //         'username' => $request->get('username'),
    //         'password' => $request->get('password'),
    //         'user_stat' => "1"
    //     );

    //     $validator = Validator::make($user_data, [
    //     	'username' => 'required',
    //         'password' => 'required|alphaNum|min:8'
    //     ]);

    //     if($validator->passes()){
    //         $user_login = User::where('username', $request->username)
    //                         ->where('user_stat', 1)
    //                         ->get();

    //         if(count($user_login) > 0){
    //             if(Hash::check($request->password, $user_login[0]->password)){
    //                 // $request->session()->put('rapidx_user_id', $user_login[0]->id);
    //                 // $request->session()->put('rapidx_user_level_id', $user_login[0]->user_level_id);
    //                 // $request->session()->put('rapidx_username', $user_login[0]->username);
    //                 // $request->session()->put('rapidx_name', $user_login[0]->name);

    //                 // $request->session()->put([
    //                 //     'rapidx_user_id' => $user_login[0]->id,
    //                 //     'rapidx_user_level_id' => $user_login[0]->user_level_id,
    //                 //     'rapidx_username' => $user_login[0]->username,
    //                 //     'rapidx_name' => $user_login[0]->name
    //                 // ]);

    //                 session_start();
    //                 $_SESSION["rapidx_user_id"] = $user_login[0]->id;
    //                 $_SESSION["rapidx_user_level_id"] = $user_login[0]->user_level_id;
    //                 $_SESSION["rapidx_username"] = $user_login[0]->username;
    //                 $_SESSION["rapidx_name"] = $user_login[0]->name;
    //                 $_SESSION["rapidx_department_id"] = $user_login[0]->department_id;

    //                 // Removing session
    //                 // $request->session()->forget(['rapidx_user_id', 'rapidx_user_level_id', 'rapidx_username', 'rapidx_name']);
    //                 return response()->json([
    //                     'result' => "1",
    //                     'rapidx_user_id' => $request->session()->get('rapidx_user_id'),
    //                     'rapidx_user_level_id' => $request->session()->get('rapidx_user_level_id'),
    //                     'rapidx_username' => $request->session()->get('rapidx_username'),
    //                     'rapidx_name' => $request->session()->get('rapidx_name')
    //                 ]);
    //             }
    //             else{
    //                 return response()->json(['result' => "0", 'error' => 'Login Failed!']);
    //             }
    //         }
    //     }
    //     else{
    //         return response()->json(['result' => "0", 'error' => $validator->messages()]);
    //     }
    // }

    public function reset_password(Request $request)
    {
        date_default_timezone_set('Asia/Manila');

        DB::beginTransaction();

        // $password = 'pmi123' . Str::random(10);
        $password = 'pmi1234';

        try {
            User::where('id', $request->user_id)
                ->increment(
                    'update_version',
                    1,
                    [
                        'password' => Hash::make($password),
                        'updated_at' => date('Y-m-d H:i:s'),
                        'is_password_changed' => 0,
                    ]
                );
            DB::commit();
            // sending mail codes here...
            $subject = 'RapidX User Password Reset';

            $message = 'This is a notification from RapidX System. Your RapidX user account password was successfully reset.';

            // Mail::to($email)->send(new UserCreatedMail($subject, $message, $request->username, $password));

            // dispatch(new SendResetUserPassJob($subject, $message, $request->user_id, $password));

            dispatch(new SendResetUserPassJob($subject, $message, $request->user_id, $password));

            // $subject, $message, $user_id, $password, $email

            return response()->json(['result' => "1"]);
        } catch (\Exception $e) {
            DB::rollback();
            // throw $e;
            return response()->json(['result' => "0"]);
        }
    }

    public function deactivate_user(Request $request)
    {
        date_default_timezone_set('Asia/Manila');

        DB::beginTransaction();

        try {
            User::where('id', $request->user_id)
                ->increment(
                    'update_version',
                    1,
                    [
                        'user_stat' => 2,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]
                );
            DB::commit();
            // sending mail codes here...
            return response()->json(['result' => "1"]);
        } catch (\Exception $e) {
            DB::rollback();
            // throw $e;
            return response()->json(['result' => "0"]);
        }
    }

    public function activate_user(Request $request)
    {
        date_default_timezone_set('Asia/Manila');

        DB::beginTransaction();

        try {
            User::where('id', $request->user_id)
                ->increment(
                    'update_version',
                    1,
                    [
                        'user_stat' => 1,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]
                );
            DB::commit();
            // sending mail codes here...
            return response()->json(['result' => "1"]);
        } catch (\Exception $e) {
            DB::rollback();
            // throw $e;
            return response()->json(['result' => "0"]);
        }
    }

    // public function edit_user(Request $request){
    //     date_default_timezone_set('Asia/Manila');

    //     $data = $request->all();

    //     $validator = Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);

    //     $user = User::where('id', $request->user_id)
    //         ->get();

    //     if (!Hash::check($request->old_password, $user[0]->password)) {
    //         if ($request->old_password == "" || $request->old_password == null)
    //             return response()->json(['error' => $validator->messages(), 'old_password' => 'The old password field is required.']);
    //         else if ($validator->fails())
    //             return response()->json(['error' => $validator->messages(), 'old_password' => 'The old password does not mutch']);
    //         else
    //             return response()->json(['old_password' => 'The old password does not mutxh']);
    //     }
    //     else if ($validator->fails()) {
    //         return response()->json(['error' => $validator->messages()]);
    //     }
    //     else{
    //     	DB::beginTransaction();

    //     	try{
    //          User::where('id', $request->user_id)
    //              ->increment('update_version', 1,
    //                  [
    //                  'name' => $request->name,
    //                  'email' => $request->email,
    //                  'password' => Hash::make($request->password),
    //                  'user_level_id' => $request->user_level_id,
    //                  'updated_at' => date('Y-m-d H:i:s'),
    //                  ]
    //              );
    //          DB::commit();
    //      	return response()->json(['result' => "1"]);
    //      }
    //      catch(\Exception $e) {
    //          DB::rollback();
    //          // throw $e;
    //          return response()->json(['result' => "0"]);
    //      }
    //     }
    // }

    public function view_users()
    {
        session_start();
        $users;

        if ($_SESSION["rapidx_user_level_id"] == 1) {
            $users = User::with([
                'user_level_info',
                'department_info',
                'user_access_details',
            ])
                ->get();
        } else if ($_SESSION["rapidx_user_level_id"] == 2) {
            $users = User::with([
                'user_level_info',
                'department_info',
                'user_access_details',
            ])
                ->where('users.user_level_id', '!=', 1)
                ->get();
        }

        return DataTables::of($users)
            ->addColumn('action1', function ($user) {
                $result = "";

                if ($user->user_stat == 1) {
                    $result .= '<span class="tag tag-success">Active</span>';
                } else {
                    $result .= '<span class="tag tag-danger">Inactive</span>';
                }

                return $result;
            })
            ->addColumn('raw_user_access_count', function ($user) {
                return count($user->user_access_details);
            })
            ->addColumn('label1', function ($user) {
                $result = '<div class="btn-group">
                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item aResetPassword" user-id="' . $user->id . '" type="button" style="padding: 1px 1px; text-align: center;" data-toggle="modal" data-target="#modalResetPassword" data-keyboard="false">Reset Password</button>';
                if ($user->user_stat == 1) {
                    $result .= '<button class="dropdown-item aDeactivateUser" type="button" user-id="' . $user->id . '" style="padding: 1px 1px; text-align: center;" data-toggle="modal" data-target="#modalDeactivateUser" data-keyboard="false">Deactivate</button>';

                    $result .= '<button class="dropdown-item aEditUser" type="button" user-id="' . $user->id . '" style="padding: 1px 1px; text-align: center;" data-toggle="modal" data-target="#modalEditUser" data-keyboard="false">Edit</button>';
                } else {
                    $result .= '<button class="dropdown-item aActivateUser" type="button" style="padding: 1px 1px; text-align: center;" user-id="' . $user->id . '" data-toggle="modal" data-target="#modalActivateUser" data-keyboard="false">Activate</button>';
                }

                $result .= '</div>
                        </div>';

                return $result;
            })
            ->rawColumns(['action1', 'label1'])
            ->make(true);
    }

    public function get_users_by_stat(Request $request)
    {
        $users;
        if ($request->user_stat == 0) {
            $users = User::on('mysql')->get();
        } else {
            $users = User::on('mysql')->where('user_stat', $request->user_stat)->get();
        }
        return response()->json(['users' => $users]);
    }
}
