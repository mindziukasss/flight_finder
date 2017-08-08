<?php

namespace app\Models;


class FF_flights extends FFBaseModel
{
    protected $table = ' ff_flights';

    protected $fillable = ['id', 'arrival', 'departure', 'destintation_id', 'orgin_id', 'airline_id'];

}