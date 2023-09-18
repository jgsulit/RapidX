<?php

namespace App\Http\Controllers;

use App\Model\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DataTables;

class DepartmentController extends Controller
{
    //
    public function add_department(Request $request){
        date_default_timezone_set('Asia/Manila');

        $data = $request->all();

        $validator = Validator::make($data, [
            'department_name' => ['required', 'string', 'max:255', 'unique:departments'],
        ]);

        if ($validator->fails()) {
            return response()->json(['result' => '0', 'error' => $validator->messages()]);
        }
        else{
            DB::beginTransaction();

            try{
                Department::insert([
                    'department_name' => $request->department_name,
                    'department_stat' => 1,
                    'update_version' => 1,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s')
                ]);
                DB::commit();
                return response()->json(['result' => "1"]);
            }
            catch(\Exception $e) {
                DB::rollback();
                // throw $e;
                return response()->json(['result' => "0"]);
            }
        }
    }

    public function get_department_by_id(Request $request){
        $department = Department::where('department_id', $request->department_id)->get();
        return response()->json(['department' => $department]);
    }

	public function get_department_by_stat(Request $request){
		$departments;
		if($request->department_stat == 0){
			$departments = Department::all();
		}
		else{
			$departments = Department::where('department_stat', $request->department_stat)->get();
		}
		return response()->json(['departments' => $departments]);
	}

	public function view_department_by_stat(Request $request){
        $departments;
                    
        if($request->department_stat == 0){
        	$departments = Department::all();
        }
        else {
        	$departments = Department::where('department_stat', $request->department_stat)->get();
        }

        return DataTables::of($departments)
            ->addColumn('action1', function($department){
                $result = "";

                if($department->department_stat == 1){
                    $result .= '<span class="tag tag-success">Active</span>';
                }
                else{
                    $result .= '<span class="tag tag-danger">Inactive</span>';
                }

                return $result;
            })
            ->addColumn('label1', function($department){
                $result = '<button class="btn btn-primary aEditDepartment" type="button" department-id="' . $department->department_id . '" data-toggle="modal" data-target="#modalEditDepartment" data-keyboard="false">Edit</button> ';
                if($department->department_stat == 1){
                    $result .= '<button class="btn btn-danger aArchiveDepartment" type="button" department-id="' . $department->department_id . '" data-toggle="modal" data-target="#modalArchiveDepartment" data-keyboard="false">Archive</button>';
                }
                else{
                    $result .= '<button class="btn btn-success aRestoreDepartment" type="button" department-id="' . $department->department_id . '" data-toggle="modal" data-target="#modalRestoreDepartment" data-keyboard="false">Restore</button>';
                }

                return $result;
            })
            ->rawColumns(['action1', 'label1'])
            ->make(true);
    }

    public function archive_department(Request $request){
        date_default_timezone_set('Asia/Manila');
        
        DB::beginTransaction();

        try{
	        Department::where('department_id', $request->department_id)
	            ->increment('update_version', 1, 
	                [
	                    'department_stat' => 2,
	                    'updated_at' => date('Y-m-d H:i:s'),
	                ]
	            );
	        DB::commit();
	        return response()->json(['result' => "1"]);
	    }
		catch(\Exception $e) {
            DB::rollback();
            // throw $e;
            return response()->json(['result' => "0"]);
        }  
    }

    public function restore_department(Request $request){
        date_default_timezone_set('Asia/Manila');
        
        DB::beginTransaction();

        try{
	        Department::where('department_id', $request->department_id)
	            ->increment('update_version', 1, 
	                [
	                    'department_stat' => 1,
	                    'updated_at' => date('Y-m-d H:i:s'),
	                ]
	            );
	        DB::commit();
	        return response()->json(['result' => "1"]);
	    }
		catch(\Exception $e) {
            DB::rollback();
            // throw $e;
            return response()->json(['result' => "0"]);
        }  
    }

    public function edit_department(Request $request){
        date_default_timezone_set('Asia/Manila');
        
        DB::beginTransaction();

        try{
            Department::where('department_id', $request->department_id)
                ->increment('update_version', 1, 
                    [
                        'department_name' => $request->department_name,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]
                );
            DB::commit();
            return response()->json(['result' => "1"]);
        }
        catch(\Exception $e) {
            DB::rollback();
            // throw $e;
            return response()->json(['result' => "0"]);
        }  
    }
}
