<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Serie;

class Inventory extends Model
{
    protected $fillable = [
        'brand', 'quantity', 'type', 'model', 'unity', 'color', 'value', 'feature', 'size', 'description', 'concept', 'quality', 'status', 'user_id'
    ];
}
