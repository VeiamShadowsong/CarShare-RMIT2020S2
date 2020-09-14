<?php

use Illuminate\Database\Seeder;

class LicenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $licenses = [
        [
            'user_id' => '1',
            'number' => '001002003',
            'expired_at' => '2050-01-01'
        ],
    ];

        // Create Administrators
        DB::statement("SET foreign_key_checks=0");
        DB::table('licenses')->truncate();
        DB::statement("SET foreign_key_checks=1");
        DB::table('licenses')->insert($licenses);
    }
}
