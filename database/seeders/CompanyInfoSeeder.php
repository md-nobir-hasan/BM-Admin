<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = [
            ['name' => 'BM-Admin', 'title' => 'BM-Admin', 'logo' => 'images/seeder/logo.png', 'address' => 'Agargoan,Dhaka'],
        ];
        $n2 = [
            ['phone' => '01730887901', 'whatsapp' => '01730887901', 'facebook_group_link' => '', 'email' => 'support@bmadmin.com'],
        ];

        DB::table('company_infos')->insert($n);
        DB::table('company_contacts')->insert($n2);
    }
}
