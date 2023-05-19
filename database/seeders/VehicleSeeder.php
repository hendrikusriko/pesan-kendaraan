<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Inova reborn',
                'police_number' => 'AB1234EE',
                'color' => 'White',
                'vehicle_type' => 'people_transport',
                'ownership' => 'company',
                'fuel_consum' => '12',
                'service_date' => '2023-05-30',
            ],
            [
                'name' => 'Mitsubishi fuso',
                'police_number' => 'AA1343QW',
                'color' => 'White',
                'vehicle_type' => 'freight_transport',
                'ownership' => 'company',
                'fuel_consum' => '15',
                'service_date' => '2023-06-5',
            ],
            [
                'name' => 'Pajero sport',
                'police_number' => 'DK1156XE',
                'color' => 'White',
                'vehicle_type' => 'people_transport',
                'ownership' => 'rental',
                'fuel_consum' => '10',
                'service_date' => '2023-06-30',
            ],
        ];
        DB::table('vehicle')->insert($data);
    }
}
