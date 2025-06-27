<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = [
            'dollar_rate' => 130
        ];

        DB::table('site_settings')->insert($n);
    }
}
