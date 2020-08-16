<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'username' => 'hdplz',
                'password' => Hash::make('hdplz'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Create Administrators
        DB::statement("SET foreign_key_checks=0");
        DB::table('admins')->truncate();
        DB::statement("SET foreign_key_checks=1");
        DB::table('admins')->insert($admins);
    }
}
