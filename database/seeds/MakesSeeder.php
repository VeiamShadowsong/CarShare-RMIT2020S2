<?php

use Illuminate\Database\Seeder;

class MakesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $makes = [
            [
                'name' => 'Audi',
                'logo' => null
            ],
            [
                'name' => 'Ford',
                'logo' => null
            ],
            [
                'name' => 'BMW',
                'logo' => null
            ],
            [
                'name' => 'Holden',
                'logo' => null
            ],
            [
                'name' => 'Honda',
                'logo' => null
            ],
        ];

        // Create Administrators
        DB::statement("SET foreign_key_checks=0");
        DB::table('makes')->truncate();
        DB::statement("SET foreign_key_checks=1");
        DB::table('makes')->insert($makes);
    }
}
