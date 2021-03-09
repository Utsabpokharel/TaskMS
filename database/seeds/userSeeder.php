<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('all_users')->insert([
            'emp_id' => '001',
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'role_id' => '1',
            'department_id' => '1',
            'gender' => 'male',
            'position' => 'Developer',
            'joined_date' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
