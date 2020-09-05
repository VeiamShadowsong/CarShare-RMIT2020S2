<?php

use Illuminate\Database\Seeder;

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
                'password' => 'aaa',
                'first_name' => 'Tony',
                'last_name' => 'Stark'
            ],
            [
                'email' => 'bbb@bbb.com',
                'password' => 'bbb',
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
