<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Wallet extends Model
{
    use SoftDeletes;
    protected $fillable=['user_id','bank_type','amount','trx_id','ss','status','deleted_at','created_at','updated_at','deleted_by','created_by','updated_by'];
    protected $appends = ['status_formatted'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusFormattedAttribute()
    {
        return match($this->status){
            1 => 'Approved',
            2 => 'Pending',
            3 => 'Rejected',
            default => 'Unknown',
        };
    }
}

