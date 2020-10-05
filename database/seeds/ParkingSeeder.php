<?php

use Illuminate\Database\Seeder;

class ParkingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lat = env('DEFAULT_LAT');
        $lng = env('DEFAULT_LNG');
        $zoom = 100000;
        $randomRange = 2000;

        $parkings = [];
        for($i = 0; $i < 10; $i ++) {
            array_push($parkings, [
                'name' => 'Unknown Parking ' . $i,
                'address' => 'Unknown address ' . $i,
                'lat' => $lat + rand(-$randomRange, $randomRange)/$zoom,
                'lng' => $lng + rand(-$randomRange, $randomRange)/$zoom
            ]);
        }

        // Create Administrators
        DB::statement("SET foreign_key_checks=0");
        DB::table('parkings')->truncate();
        DB::statement("SET foreign_key_checks=1");
        DB::table('parkings')->insert($parkings);
    }
}
