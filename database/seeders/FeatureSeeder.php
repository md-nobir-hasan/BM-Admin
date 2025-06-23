<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = [
            ['name' => 'Home', 'status' => 1],
            ['name' => 'Wallet', 'status' => 1],

            ['name' => 'Site Info', 'status' => 1],
            ['name' => 'User Management', 'status' => 1],
            ['name' => 'Role', 'status' => 1], //5
            ['name' => 'User Creation', 'status' => 1],

            ['name' => 'Images', 'status' => 1],
            ['name' => 'Setting', 'status' => 1],

            ['name' => 'Features', 'status' => 1],
            ['name' => 'Site Setting', 'status' => 1], //10
            ['name' => 'Main Keys', 'status' => 1],
            ['name' => 'Services', 'status' => 1],
            ['name' => 'Setting Setup', 'status' => 1],
            ['name' => 'Ad Account', 'status' => 1], //14
            ['name' => 'Cache Clear', 'status' => 1], //14
            ['name' => 'Optimization', 'status' => 1], //14
        ];

        DB::table('features')->insert($n);
    }
}
