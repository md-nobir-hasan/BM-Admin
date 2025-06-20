<?php

namespace App\Http\Controllers;


use App\Models\CompanyInfo;
use App\Models\CompanyContact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    public function __construct()
    {
        // Remove middleware definition
    }
    public function home()
    {
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        //websiteSetting check
        $data = CompanyInfo::all();
        if (count($data) < 1) {
            return redirect()->route('company-details.create');
            $company_info = CompanyInfo::first();
            $company_contact_info = CompanyContact::first();
        }


        $user = Auth::user();
        //    if ($user->roll == 2){
        return view('backend.pages.index');
        //    }else{
        //     return redirect()->route('home');
        //    }


    }
}
