<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Serie;

class Inventory extends Model
{
    protected $fillable = [
        'brand','serial','type','model','color','value','feature','description','user_id',
    ];
    public $table = "inventories";
}
