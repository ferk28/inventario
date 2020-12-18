<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Serie;

class Inventory extends Model
{
    public $table = "tagslist";
    public $fillable = ['name'];
}
