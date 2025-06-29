<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = [
                //Super Admin permissions
                ['role_id' => 1,'feature_id' => 1,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                ['role_id' => 1,'feature_id' => 2,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                ['role_id' => 1,'feature_id' => 3,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                ['role_id' => 1,'feature_id' => 4,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                ['role_id' => 1,'feature_id' => 5,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                ['role_id' => 1,'feature_id' => 6,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                ['role_id' => 1,'feature_id' => 7,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                ['role_id' => 1,'feature_id' => 8,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                ['role_id' => 1,'feature_id' => 9,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                ['role_id' => 1,'feature_id' => 10,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                ['role_id' => 1,'feature_id' => 11,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                ['role_id' => 1,'feature_id' => 12,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                ['role_id' => 1,'feature_id' => 13,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                ['role_id' => 1,'feature_id' => 14,'add' => '1','show' => '2','edit' => '3','delete' => '4'],

                  //Customer permissions
                  ['role_id' => 2,'feature_id' => 1,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                //   ['role_id' => 1,'feature_id' => 2,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                //   ['role_id' => 1,'feature_id' => 3,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                //   ['role_id' => 1,'feature_id' => 4,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                //   ['role_id' => 1,'feature_id' => 5,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                //   ['role_id' => 1,'feature_id' => 6,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                //   ['role_id' => 1,'feature_id' => 7,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                //   ['role_id' => 1,'feature_id' => 8,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                //   ['role_id' => 1,'feature_id' => 9,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                //   ['role_id' => 1,'feature_id' => 10,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                //   ['role_id' => 1,'feature_id' => 11,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                //   ['role_id' => 1,'feature_id' => 12,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                //   ['role_id' => 1,'feature_id' => 13,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
                //   ['role_id' => 1,'feature_id' => 14,'add' => '1','show' => '2','edit' => '3','delete' => '4'],
            ];

            DB::table('permissions')->insert($n);

    }
}
