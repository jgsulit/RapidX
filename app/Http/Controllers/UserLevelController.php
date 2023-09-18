<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UserLevel;

class UserLevelController extends Controller
{
    //
    public function get_user_level_by_stat(Request $request){
		$user_levels;
		if($request->user_level_stat == 0){
			$user_levels = UserLevel::on('mysql')->get();
		}
		else{
			$user_levels = UserLevel::on('mysql')->where('user_level_stat', $request->user_level_stat)->get();
		}
		return response()->json(['user_levels' => $user_levels]);
    }
}
