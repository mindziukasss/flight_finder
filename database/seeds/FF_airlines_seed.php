<?php

use App\Models\FF_airlines;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class FF_airlines_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $airlines = [
            ["name" => "Ryanair"],
            ["name" => "Mistral Air"],
            ["name" => "Meridiana"],
            ["name" => "Lufthansa"],
            ["name" => "Eurowings"],
            ["name" => "El Al"],
            ["name" => "Easy Jet"],
            ["name" => "Brussels Airlines"],
            ["name" => "British Airways"],
            ["name" => "Alitalia"],
            ["name" => "Air Transat"],
            ["name" => "Mistral Air"],
            ["name" => "Air Malta"],
            ["name" => "Air Madagascar"],
            ["name" => "Air France"],
            ["name" => "Air Corsica"],
            ["name" => "Air Canada"],
            ["name" => "Air Austral"],
            ["name" => "Air Algerie"],
            ["name" => "Aigle Azur"],
            ['name' => 'AirTanker'] ,
            ['name' => 'Atlantic Airlines'],
            ['name' => 'BA CityFlyer'],
            ['name' => 'BAE Systems Corporate Air Travel'],
            ['name' => 'BMI Regional'],
            ['name' => 'Bristow Helicopters'],
            ['name' => 'British Airways'],
            ['name' => 'CargoLogicAir'],
            ['name' => 'Cello Aviation'],
            ['name' => 'DHL Air UK'],
            ['name' => 'Eastern Airways'],
            ['name' => 'EasyJet'],
            ['name' => 'Flybe'],
            ['name' => 'Jet2'],
            ['name' => 'Jota Aviation'],

        ];
        DB::beginTransaction();
        try {
            foreach ($airlines as $item) {
                $record = FF_airlines::find($item['name']);
                if (!$record) {
                    FF_airlines::create([
                        'id' => Uuid::uuid4(),
                        'name'=>$item['name']
                    ]);
                }
            }
        } catch (Exception $e) {
            DB::rollback();
            echo 'Point of failure ' . $e->getCode() . ' ' . $e->getMessage();
            throw new Exception($e);
        }
        DB::commit();
    }
}
