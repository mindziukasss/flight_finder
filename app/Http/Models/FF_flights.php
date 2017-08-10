<?php

namespace App\Models;


class FF_flights extends FFBaseModel
{
    protected $table = 'ff_flights';

    protected $fillable = ['id', 'airline_id', 'departure', 'arrival', 'orgin_id', 'destintation_id'];

    protected $with = ['originAirport', 'destinationAirport', 'airline'];

    public function originAirport() {
        return $this->hasOne(FF_airports::class, 'id', 'orgin_id');
    }

    public function destinationAirport() {
        return $this->hasOne(FF_airports::class, 'id', 'destintation_id');
    }

    public function airline() {
        return $this->hasOne(FF_airlines::class, 'id', 'airline_id');
    }





}