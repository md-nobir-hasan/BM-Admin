<?php
use App\Models\Permission;
use App\Models\Feature;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Services\SteadFastCourierService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function check($main_feature){
     // dd($permission1);
     $role_id =Auth::user()->role_id;
     $feature_id = Feature::where('name',$main_feature)->where('status',1)->first();
    //  dd($main_feature,$feature_id);

     if($role_id && $feature_id){


        $check = Permission::where('role_id',$role_id)
                            ->where('feature_id', $feature_id->id)->first();
        if($check){
            //  if($permission2){
            //      $check2 = Permission::where('role_id',$role_id)
            //                  ->where('permission',$permission2)->first();

            //      if($check2){
            //          // dd($check);
            //          if($permission3){
            //              $check3 = Permission::where('role_id',$role_id)
            //                      ->where('permission',$permission3)->first();

            //              if($check3){
            //                  if($permission4){
            //                      $check4 = Permission::where('role_id',$role_id)
            //                              ->where('permission',$permission4)->first();
            //                      if($check4){
            //                          return true;
            //                      }else{
            //                          return false;
            //                      }
            //                  }
            //                 else{
            //                  return true;
            //                 }
            //              }else{
            //                  return false;
            //              }
            //          }
            //         else{
            //          return true;
            //         }
            //      }else{
            //          // dd('return false');
            //          return false;
            //      }
            //  }
            // else{
            //  return true;
            // }
            return $check;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function serviceCheck($service_name){
    $check = Service::where('name',$service_name)->where('status',1)->first();
    if($check){
        $has_service = SiteSetting::with(['service','user'])->where('service_id',$check->id)->first();
        if($has_service){
            return $has_service;
        }else{
            return false;
        }
    }else{
        // dd('Please provide a valid service name instead of '.$service_name);
    }
}

function companyContact(){
    return DB::table('company_contacts')->first();

}
function companyInfo(){
    return DB::table('company_infos')->first();

}

function steadFastCourier(){
    return new SteadFastCourierService();
}

function correntBallance($ad_balances,$ad_accounts){
    $adding_ammount = $ad_balances->where('status',1)->sum('amount');
    $spend_ammount = 0;
    foreach($ad_accounts as $ad_account){
        $spend_ammount += $ad_account->balance * $ad_account->dollar_rate;
    }
    // dd($ad_balances,$spend_ammount);
    return round($adding_ammount - $spend_ammount,2);
}

