<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
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
                        'user_id' => "01518460933",
                        'name' => "Md Nobir Hasan",
                        'busuness_name' => "Md Nobir Hasan",
                        'busuness_website' => "Md Nobir Hasan",
                        'email' => "nobir.wd@gmail.com",
                        'phone' => "01518460933",
                        'dollar_rate' => 130,
                        // 'current_balance' => 10000,
                        'role_id' => 1,
                        'is_approved'=>true,
                        'password' => Hash::make(1988406007),
                    ],
                    [
                        'user_id' => "01111111111",
                        'name' => "Md Customer",
                        'busuness_name' => "Md Customer",
                        'busuness_website' => "Md Customer",
                        'email' => "customer@gmail.com",
                        'phone' => "01518460934",
                        'dollar_rate' => 130,
                        // 'current_balance' => 10000,
                        'role_id' => 2,
                        'is_approved'=>true,
                        'password' => Hash::make(1111),
                    ]
                ];

        DB::table('users')->insert($n);
    }
}

