<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permissions')->insert(
            ['name' => 'Add User', 'slug' => 'add-user', 'description' => 'Anyone with this permission can add new user', 'created_at' => now(), 'updated_at' => now()],


        );
    }
}
