<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWalletRequest;
use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\Coupon;

class WalletController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!check('Wallet')->show){
            return back();
        }

        $n['pending_balances']=Wallet::with('user')->where('status',2)->get();
        $n['all_balances']=Wallet::with('user')->where('status','!=', 2)->paginate(10);
        return view('backend.pages.wallet.index',$n);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!check('Wallet')->add){
            return back();
        }

        return view('backend.pages.wallet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWalletRequest $request)
    {
        // if(!check('Wallet')?->add){
        //     return back();
        // }

        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['is_approved'] = false;

        if($request->hasFile('ss')){
            $image = $request->file('ss');
            $uniqueName = uniqid('receipt_', true) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('receipt-copy', $uniqueName, 'public');
            $data['ss'] = $path;
        }
        // return $data;
        $status=Wallet::create($data);
        if($status){
            request()->session()->flash('success','Wallet successfully created');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!check('Wallet')->edit){
            return back();
        }

        $Wallet=Wallet::find($id);
        if(!$Wallet){
            request()->session()->flash('error','Wallet not found');
        }
        return view('backend.pages.wallet.edit')->with('Wallet',$Wallet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!check('Wallet')->edit){
            return back();
        }

        $Wallet=Wallet::find($id);
        $this->validate($request,[
            'type'=>'string|required',
            'price'=>'nullable|numeric',
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        // return $data;
        $status=$Wallet->fill($data)->save();
        if($status){
            request()->session()->flash('success','Wallet successfully updated');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('wallet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!check('Wallet')->delete){
            return back();
        }

        $Wallet=Wallet::find($id);
        if($Wallet){
            $status=$Wallet->delete();
            if($status){
                request()->session()->flash('success','Wallet successfully deleted');
            }
            else{
                request()->session()->flash('error','Error, Please try again');
            }
            return redirect()->route('wallet.index');
        }
        else{
            request()->session()->flash('error','Wallet not found');
            return redirect()->back();
        }
    }

    public function ajaxUpdate(Request $request, $id)
    {
        $wallet = Wallet::findOrFail($id);

        $request->validate([
            'amount' => 'required|numeric',
            'trx_id' => 'required|string',
            'status' => 'required|in:1,2,3',
        ]);

        $wallet->amount = $request->amount;
        $wallet->trx_id = $request->trx_id;
        $wallet->status = $request->status;
        $wallet->save();

        return response()->json(['success' => true, 'message' => 'Wallet updated successfully.']);
    }
}
