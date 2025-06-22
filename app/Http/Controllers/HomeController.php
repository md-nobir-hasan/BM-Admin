<?php

namespace App\Http\Controllers;

use App\Models\AdAccount;
use App\Models\CompanyInfo;
use App\Models\CompanyContact;
use App\Models\Wallet;
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
        $n['wallet'] = Wallet::where('user_id',auth()->user()->id)->where('status',1)->latest()->get();
        $n['ad_accounts'] = AdAccount::where('user_id',auth()->user()->id)->latest()->get();
        return view('backend.pages.index',$n);

    }
}
