<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
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
                'name' => 'Admin',
                'email' => 'admin@admin.admin',
                'is_admin' => '1',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'jono',
                'email' => 'jono@jono.jono',
                'is_admin' => '0',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'goku',
                'email' => 'goku@goku.goku',
                'is_admin' => '0',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'gohan',
                'email' => 'gohan@gohan.gohan',
                'is_admin' => '0',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'budi',
                'email' => 'budi@budi.budi',
                'is_admin' => '0',
                'password' => bcrypt('123456'),
            ],
        ];
        DB::table('users')->insert($data);
    }
}
