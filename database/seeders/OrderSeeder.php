<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
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
                'driver_id' => '1',
                'vehicle_id' => '1',
                'order_date' => '2023-05-27',
                'staf_one' => '2',
                'staf_two' => '3',
                'acc_mark' => '0',
            ],
            [
                'driver_id' => '3',
                'vehicle_id' => '3',
                'order_date' => '2023-06-17',
                'staf_one' => '4',
                'staf_two' => '5',
                'acc_mark' => '0',
            ],
        ];
        DB::table('order')->insert($data);
    }
}
