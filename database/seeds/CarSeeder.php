<?php

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Make;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userCount = User::count();
        $makeCount = Make::count();
        $lat = -37.8106277;
        $lng = 144.9634516;
        $zoom = 100000;
        $randomRange = 2000;
        $types = [
            'car',
            'suv',
            'truck'
        ];
        $colors = [
            'blue',
            'white',
            'black',
            'yellow',
            'green',
            'red'
        ];

        $cars = [];
        for($i = 0; $i < 10; $i ++) {
            array_push($cars, [
                'user_id' => rand(1, $userCount),
                'make_id' => rand(1, $makeCount),
                'number' => substr(bin2hex(openssl_random_pseudo_bytes(6)), 6),
                'type' => $types[rand(0, count($types) - 1)],
                'color' => $colors[rand(0, count($colors) - 1)],
                'lat' => $lat + rand(-$randomRange, $randomRange)/$zoom,
                'lng' => $lng + rand(-$randomRange, $randomRange)/$zoom,
                'status' => 'free'
            ]);
        }

        // Create Administrators
        DB::statement("SET foreign_key_checks=0");
        DB::table('cars')->truncate();
        DB::statement("SET foreign_key_checks=1");
        DB::table('cars')->insert($cars);
    }
}
