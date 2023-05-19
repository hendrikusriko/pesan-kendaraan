<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Maman abdurahman'],
            ['name' => 'Bambang pamungkas'],
            ['name' => 'Boas salosa'],
            ['name' => 'Gonzales'],
        ];
        DB::table('driver')->insert($data);
    }
}
