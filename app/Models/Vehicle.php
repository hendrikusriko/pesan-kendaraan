<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicle';

    protected $fillable = [
        'name',
        'police_number',
        'color',
        'vehicle_type',
        'ownership',
        'fuel_consum',
        'service_date',
    ];
}
