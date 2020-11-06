<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boss extends Model
{
    protected $fillable = [
        'name', 'area_id',
    ];
}
