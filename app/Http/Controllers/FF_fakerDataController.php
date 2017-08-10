<?php

namespace App\Http\Controllers;

use App\Models\FF_airports;
use App\Models\FF_contries;
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
}

