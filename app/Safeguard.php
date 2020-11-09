<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Inventory;
use App\Employee;

class Safeguard extends Model
{
    protected $fillable = [
        'employee_id', 'inventory_id',
    ];
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
