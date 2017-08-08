<?php

namespace App\Models;


class FF_airports extends FFBaseModel
{
    protected $table = 'ff_airports';

    protected $fillable = ['id', 'name', 'city', 'contry_id'];
}