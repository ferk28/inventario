<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Boss;

class Employee extends Model
{
    protected $fillable = [
        'name', 'boss_id',
    ];
    public function boss()
    {
        return $this->belongsTo(Boss::class);
    }
}
