<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         //Admin
         DB::table('users_roles')->insert(
            ['user_id' => 1,'role_id' => 1, 'description'=> 'Admin User'],

        );

        //User
        DB::table('users_roles')->insert(
            ['user_id' => 2,'role_id' => 2, 'description'=> 'User'],
        );
    }
}
