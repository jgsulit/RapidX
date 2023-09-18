<?php

namespace App\Http\Controllers;

use App\Model\UserAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DataTables;

class UserAccessController extends Controller
{
    //
    public function add_user_access(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        session_start();
        $data = $request->all();

        $validator = Validator::make($data, [
            'user_id' => ['required'],
            'user_level_id' => ['required'],
            'module_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json(['result' => '0', 'error' => $validator->messages()]);
        } else {
            $validate_user_access = UserAccess::where('module_id', $request->module_id)
                ->where('user_id', $request->user_id)
                ->get();

            if (count($validate_user_access) <= 0) {
                DB::beginTransaction();

                try {
                    UserAccess::insert([
                        'user_id' => $request->user_id,
                        'user_level_id' => $request->user_level_id,
                        'module_id' => $request->module_id,
                        'user_access_stat' => 1,
                        'update_version' => 1,
                        'created_by' => $_SESSION['rapidx_user_id'],
                        'last_updated_by' => $_SESSION['rapidx_user_id'],
                        'updated_at' => date('Y-m-d H:i:s'),
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                    DB::commit();
                    return response()->json(['result' => "1"]);
                } catch (\Exception $e) {
                    DB::rollback();
                    // throw $e;
                    return response()->json(['result' => "0"]);
                }
            } else {
                return response()->json(['result' => "0", "error_message" => 'Already Exist!']);
            }
        }
    }

    public function edit_user_access(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        session_start();
        $data = $request->all();

        $validator = Validator::make($data, [
            'user_id' => ['required'],
            'user_level_id' => ['required'],
            'module_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json(['result' => '0', 'error' => $validator->messages()]);
        } else {
            DB::beginTransaction();

            try {
                UserAccess::where('user_access_id', $request->user_access_id)
                    ->increment(
                        'update_version',
                        1,
                        [
                            'user_id' => $request->user_id,
                            'user_level_id' => $request->user_level_id,
                            'module_id' => $request->module_id,
                            'last_updated_by' => $_SESSION['rapidx_user_id'],
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
        }
    }

    public function get_user_access_by_id(Request $request)
    {
        $user_access = UserAccess::where('user_access_id', $request->user_access_id)->get();
        return response()->json(['user_access' => $user_access]);
    }

    public function view_user_access_by_stat(Request $request)
    {
        $user_accesses;

        if ($request->user_access_stat == 0) {
            $user_accesses = UserAccess::on('mysql')
                ->join('modules', 'modules.module_id', '=', 'user_accesses.module_id')
                ->join('user_levels', 'user_levels.user_level_id', '=', 'user_accesses.user_level_id')
                ->join('users', 'users.id', '=', 'user_accesses.user_id')
                ->get();
        } else {
            $user_accesses = UserAccess::on('mysql')
                ->join('modules', 'modules.module_id', '=', 'user_accesses.module_id')
                ->join('user_levels', 'user_levels.user_level_id', '=', 'user_accesses.user_level_id')
                ->join('users', 'users.id', '=', 'user_accesses.user_id')
                ->where('user_access_stat', $request->user_access_stat)
                ->get();
        }

        return DataTables::of($user_accesses)
            ->addColumn('action1', function ($user_access) {
                $result = "";

                if ($user_access->user_access_stat == 1) {
                    $result .= '<span class="tag tag-success">Active</span>';
                } else {
                    $result .= '<span class="tag tag-danger">Inactive</span>';
                }

                return $result;
            })
            ->addColumn('label1', function ($user_access) {
                $result = '<button class="btn btn-primary aEditUserAccess" type="button" user-access-id="' . $user_access->user_access_id . '" data-toggle="modal" data-target="#modalEditUserAccess" data-keyboard="false">Edit</button> ';
                if ($user_access->user_access_stat == 1) {
                    $result .= '<button class="btn btn-danger aArchiveUserAccess" type="button" user-access-id="' . $user_access->user_access_id . '" data-toggle="modal" data-target="#modalArchiveUserAccess" data-keyboard="false">Archive</button>';
                } else {
                    $result .= '<button class="btn btn-success aRestoreUserAccess" type="button" user-access-id="' . $user_access->user_access_id . '" data-toggle="modal" data-target="#modalRestoreUserAccess" data-keyboard="false">Restore</button>';
                }

                return $result;
            })
            ->rawColumns(['action1', 'label1'])
            ->make(true);
    }

    public function archive_user_access(Request $request)
    {
        date_default_timezone_set('Asia/Manila');

        DB::beginTransaction();

        try {
            UserAccess::where('user_access_id', $request->user_access_id)
                ->increment(
                    'update_version',
                    1,
                    [
                        'user_access_stat' => 2,
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
    }

    public function restore_user_access(Request $request)
    {
        date_default_timezone_set('Asia/Manila');

        DB::beginTransaction();

        try {
            UserAccess::where('user_access_id', $request->user_access_id)
                ->increment(
                    'update_version',
                    1,
                    [
                        'user_access_stat' => 1,
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
    }




    public function getUserAccess(Request $request)
    {
        $userAccess = UserAccess::where('user_id', $request->user_id)
            ->where('user_access_stat', 1)
            ->get('module_id');

        // $userLevelId = UserAccess::where('user_id', $request->user_id)
        //     ->where('module_id', 11)
        //     ->where('user_access_stat', 1)
        //     ->value('user_level_id');
        // return response()->json(['user_id' => $userAccess, 'userLevelId' => $userLevelId]);

        return response()->json(['user_id' => $userAccess]);
    }
}
