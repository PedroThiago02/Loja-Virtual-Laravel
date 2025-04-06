<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Pedro Thiago',
                'username' => 'msflix',
                'email' => 'pedrothcurso@gmail.com',
                'role' => 'admin',
                'status' => 'active',
                'password' => bcrypt('p&Dro2255')
            ],
            [
                'name' => 'Cliente user',
                'username' => 'user',
                'email' => 'cliente@gmail.com',
                'role' => 'user',
                'status' => 'active',
                'password' => bcrypt('p&Dro2255')
            ]
            ]);
    }
}
