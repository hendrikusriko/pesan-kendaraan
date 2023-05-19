<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = [
        'driver_id',
        'vehicle_id',
        'order_date',
        'staf_one',
        'staf_two',
        'acc_mark',
    ];

    public function driver()
    {
        return $this->hasOne(Driver::class, 'id', 'driver_id');
    }

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class, 'id', 'vehicle_id');
    }

    public function staf_one()
    {
        return $this->hasOne(User::class, 'id', 'staf_one');
    }

    public function staf_two()
    {
        return $this->hasOne(User::class, 'id', 'staf_two');
    }
}
