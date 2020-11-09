<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Boss;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    protected $fillable = [
        'name', 'boss_id',
    ];
    public function select()
    {

    }

    public function boss()
    {
        return $this->belongsTo(Boss::class);
    }
}
