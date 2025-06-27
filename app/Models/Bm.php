<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bm extends Model
{
    protected $fillable = ['ad_account_id','name','bm_id'];

    public function ad_account(){
        return $this->belongsTo(AdAccount::class,'ad_account_id','id');
    }
}
