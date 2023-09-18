<?php

namespace App\Http\Controllers;

use App\Model\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DataTables;

class ModuleController extends Controller
{
    //
    public function add_module(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();
        $data = $request->all();

        $validator = Validator::make($data, [
            'module_name' => ['required', 'string', 'max:255', 'unique:modules'],
        ]);

        if ($validator->fails()) {
            return response()->json(['result' => '0', 'error' => $validator->messages()]);
        }
        else{
            DB::beginTransaction();

            try{
                Module::insert([
                    'module_name' => $request->module_name,
                    'module_stat' => 1,
                    'update_version' => 1,
                    'created_by' => $_SESSION['rapidx_user_id'],
                    'last_updated_by' => $_SESSION['rapidx_user_id'],
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

    public function get_module_by_id(Request $request){
        $module = Module::where('module_id', $request->module_id)->get();
        return response()->json(['module' => $module]);
    }

	public function get_module_by_stat(Request $request){
		$modules;
		if($request->module_stat == 0){
			$modules = Module::all();
		}
		else{
			$modules = Module::where('module_stat', $request->module_stat)->get();
		}
		return response()->json(['modules' => $modules]);
	}

	public function view_module_by_stat(Request $request){
        $modules;
                    
        if($request->module_stat == 0){
        	$modules = Module::all();
        }
        else {
        	$modules = Module::where('module_stat', $request->module_stat)->get();
        }

        return DataTables::of($modules)
            ->addColumn('action1', function($module){
                $result = "";

                if($module->module_stat == 1){
                    $result .= '<span class="tag tag-success">Active</span>';
                }
                else{
                    $result .= '<span class="tag tag-danger">Inactive</span>';
                }

                return $result;
            })
            ->addColumn('label1', function($module){
                $result = '<button class="btn btn-primary aEditModule" type="button" module-id="' . $module->module_id . '" data-toggle="modal" data-target="#modalEditModule" data-keyboard="false">Edit</button> ';
                if($module->module_stat == 1){
                    $result .= '<button class="btn btn-danger aArchiveModule" type="button" module-id="' . $module->module_id . '" data-toggle="modal" data-target="#modalArchiveModule" data-keyboard="false">Archive</button>';
                }
                else{
                    $result .= '<button class="btn btn-success aRestoreModule" type="button" module-id="' . $module->module_id . '" data-toggle="modal" data-target="#modalRestoreModule" data-keyboard="false">Restore</button>';
                }

                return $result;
            })
            ->rawColumns(['action1', 'label1'])
            ->make(true);
    }

    public function archive_module(Request $request){
        date_default_timezone_set('Asia/Manila');
        
        DB::beginTransaction();

        try{
	        Module::where('module_id', $request->module_id)
	            ->increment('update_version', 1, 
	                [
	                    'module_stat' => 2,
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

    public function restore_module(Request $request){
        date_default_timezone_set('Asia/Manila');
        
        DB::beginTransaction();

        try{
	        Module::where('module_id', $request->module_id)
	            ->increment('update_version', 1, 
	                [
	                    'module_stat' => 1,
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

    public function edit_module(Request $request){
        date_default_timezone_set('Asia/Manila');
        
        DB::beginTransaction();

        try{
            Module::where('module_id', $request->module_id)
                ->increment('update_version', 1, 
                    [
                        'module_name' => $request->module_name,
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
