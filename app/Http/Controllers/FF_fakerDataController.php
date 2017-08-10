<?php

namespace App\Http\Controllers;

use App\Models\FF_airlines;
use App\Models\FF_airports;
use App\Models\FF_contries;
use App\Models\FF_flights;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Http\Request;

class FF_fakerDataController extends Controller
{
    public function generateAirports($count = 100)
    {
        function getRandomString($length = 3) {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $airport_id = '';


            for ($i = 0; $i < $length; $i++) {
                $airport_id .= $characters[mt_rand(0, strlen($characters) - 1)];
            }

            return $airport_id;
        }

        $faker = Factory::create();
        for ($i = 0; $i < $count; $i++) {
           FF_airports::create([
               'id' => getRandomString(),
                'name' => $faker->company,
               'city' => $faker->city,
               'contry_id' => FF_contries::all()->random()->id,
           ]);
        }

    }
    public function generateFlights($count = 200)
    {
        $faker = Factory::create();
        for ($i = 0; $i < $count; $i++) {
            $time = Carbon::create(rand(2017, 2018), rand(1, 12), rand(1, 31), rand(0, 23), rand(0, 59), rand(0, 59));
            FF_flights::create([
                'id' => $faker->uuid,
                'airline_id' => FF_airlines::all()->random()->id,
                'orgin_id' => FF_airports::all()->random()->id,
                'departure' => $time->toDateTimeString(),
                'destintation_id' => FF_airports::all()->random()->id,
                'arrival' => $time->addMinutes(rand(30, 960))->toDateTimeString()
            ]);
        }
    }

}

