<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert(
            ['name' => 'Developer','slug' => 'developer', 'created_at' => now(), 'updated_at' => now()],


        );

        DB::table('roles')->insert(

            ['name' => 'User','slug' => 'user', 'created_at' => now(), 'updated_at' => now()],



        );
        DB::table('roles')->insert(

            ['name' => 'Admin','slug' => 'admin', 'created_at' => now(), 'updated_at' => now()]


        );




    }
}
