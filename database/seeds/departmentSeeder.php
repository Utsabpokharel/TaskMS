<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class departmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = array(
            'main_dept'=>'IT Department',
            'sub_dept'=>'BackEnd',
            'description'=>'All the IT departments related information\'s are under this department',
            'created_at'=>date("Y-m-d H:i:s")
        );
        DB::table('departments')->insert($departments);
    }
}
