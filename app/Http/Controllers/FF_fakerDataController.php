<?php

namespace App\Http\Controllers;

use App\Models\FF_airports;
use App\Models\FF_contries;
use Faker\Factory;
use Illuminate\Http\Request;

class FF_fakerDataController extends Controller
{
    public function generateAirports($count = 500)
    {
        $faker = Factory::create();
        for ($i = 0; $i < $count; $i++) {
           FF_airports::create([
                'id' => $faker->uuid,
                'name' => $faker->company,
               'city' => $faker->city,
               'contry_id' => FF_contries::all()->random()->id,
           ]);
        }

    }
}
