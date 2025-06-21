<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $n =[
            [
                "name" => "Super Admin"
            ],
            [
                "name" => "Customer"
            ]
       ];
       DB::table('roles')->insert($n);
    }
}
