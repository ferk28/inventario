<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $fillable = [
        'serie'
    ];

    protected $guarded = [
        //'serie'
    ];

/*    public function scopeSeries($query)
    {
        return $query->where('role','boss');
    }*/
}
