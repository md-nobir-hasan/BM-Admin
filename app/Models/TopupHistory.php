<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopupHistory extends Model
{
    protected $fillable = ['amount','user_id','ad_account_id'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function ad_account(){
        return $this->belongsTo(AdAccount::class,'ad_account_id','id');
    }
}
