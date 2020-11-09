<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Boss extends Model
{
    protected $fillable = [
        'name', 'area_id',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
