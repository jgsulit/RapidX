<?php

use Illuminate\Database\Seeder;
use App\Model\UserLevel;

class UserLevelsTableSeeder extends Seeder
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
	        UserLevel::create([
	        	'user_level_name' => 'Super User',
	        	'user_level_stat' => 1,
	        	'update_version' => 1,
	        	'updated_at' => date('Y-m-d H:i:s'),
	        	'created_at' => date('Y-m-d H:i:s')
	        ]);

	        UserLevel::create([
	        	'user_level_name' => 'Administrator',
	        	'user_level_stat' => 1,
	        	'update_version' => 1,
	        	'updated_at' => date('Y-m-d H:i:s'),
	        	'created_at' => date('Y-m-d H:i:s')
	        ]);

	        UserLevel::create([
	        	'user_level_name' => 'User',
	        	'user_level_stat' => 1,
	        	'update_version' => 1,
	        	'updated_at' => date('Y-m-d H:i:s'),
	        	'created_at' => date('Y-m-d H:i:s')
	        ]);

	        UserLevel::create([
	        	'user_level_name' => 'QAD Administrator',
	        	'user_level_stat' => 1,
	        	'update_version' => 1,
	        	'updated_at' => date('Y-m-d H:i:s'),
	        	'created_at' => date('Y-m-d H:i:s')
	        ]);

	        UserLevel::create([
	        	'user_level_name' => 'Other Section',
	        	'user_level_stat' => 1,
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
    }
}
