<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Rutero',
            'email' => 'rutero@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 'rutero',
        ]);

        DB::table('users')->insert([
            'name' => 'Mercadeo',
            'email' => 'mercadeo@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 'mercadeo',
        ]);


    }
}
