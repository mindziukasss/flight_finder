<?php

namespace app\Models;


class FF_contries extends FFBaseModel
{
    protected $table = 'ff_contries';

    protected $fillable = ['id', 'original_name'];
}