<?php

use Illuminate\Database\Seeder;
use App\Model\Department;

class DepartmentsTableSeeder extends Seeder
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
	        Department::create([
	        	'department_name' => 'ISS Software',
	        	'department_stat' => 1,
	        	'update_version' => 1,
	        	'updated_at' => date('Y-m-d H:i:s'),
	        	'created_at' => date('Y-m-d H:i:s')
	        ]);
	        Department::create([
	        	'department_name' => 'ISS Hardware',
	        	'department_stat' => 1,
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
