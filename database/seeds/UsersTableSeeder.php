<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        date_default_timezone_set('Asia/Manila');
        DB::beginTransaction();

        try{
	        User::create([
	        	'name' => 'Angelo Bautista',
	        	'username' => 'apbautista23',
	        	'email' => 'angelob241@gmail.com',
	        	'password' => Hash::make('apbautista23'),
	        	'is_password_changed' => 0,
	        	'user_stat' => 1,
	        	'user_level_id' => 1,
	        	'department_id' => 1,
	        	'update_version' => 1,
	        	'updated_at' => date('Y-m-d H:i:s'),
	        	'created_at' => date('Y-m-d H:i:s')
	        ]);
	        DB::commit();
	    }
	    catch(\Exception $e) {
            DB::rollback();
            // throw $e;
        }

        // LABELING
        // is_password_changed [
        //     0 => 'No',
        //     1 => 'Yes'
        // ]
    }
}
