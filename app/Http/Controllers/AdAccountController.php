<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdAccountRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\AdAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdAccountController extends Controller
{

    public function index()
    {
        $n['pending_ad_accounts'] = AdAccount::with('user')->where('status',2)->orderBy('id', 'desc')->get();
        $n['ad_accounts'] = AdAccount::with('user')->where('status','!=',2)->orderBy('id', 'desc')->get();

        return view('backend.pages.ad-account.index', $n);
    }


    public function store(StoreAdAccountRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['monthly_budget'] = 0.00;
        $data['balance'] = 0.00;
        $data['total_spent'] = 0.00;
        $data['limit'] = 0.00;
        $data['status'] = 2;

        $insert = AdAccount::create($data);

        return $insert ? back()->with('success', 'Ad Account created successfully')
                : redirect()->back()->with('error', 'Ad Account creation failed');
    }

    public function ajaxUpdate(Request $request, $id)
    {
        $ad_account = AdAccount::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:1,2,3,4',
        ]);

        $ad_account->name = $request->name;
        $ad_account->status = $request->status;
        $ad_account->save();

        return response()->json(['success' => true, 'message' => 'Ad Account updated successfully.']);
    }

}
