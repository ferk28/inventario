<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Serie;

class Inventory extends Model
{
    protected $fillable = [
        'brand', 'type', 'model', 'unity', 'color', 'value', 'feature', 'size', 'description', 'user_id'
    ];
}
