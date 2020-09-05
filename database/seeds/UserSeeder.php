<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => 'aaa@aaa.com',
                'password' => Hash::make('aaa'),
                'first_name' => 'Tony',
                'last_name' => 'Stark'
            ],
            [
                'email' => 'bbb@bbb.com',
                'password' => Hash::make('bbb'),
                'first_name' => 'Steven',
                'last_name' => 'Rogers'
            ]
        ];

        // Create Administrators
        DB::statement("SET foreign_key_checks=0");
        DB::table('users')->truncate();
        DB::statement("SET foreign_key_checks=1");
        DB::table('users')->insert($users);
    }
}
