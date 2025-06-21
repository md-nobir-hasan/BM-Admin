<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdAccount extends Model
{
    use HasFactory;
    protected $fillable = ['name','user_id', 'bm_id','credit_line','card_line',
        'fb_page_link1', 'fb_page_link2', 'fb_page_link3', 'fb_page_link4', 'fb_page_link5',
        'website_link1','website_link2',
        'monthly_budget', 'campaign_start_date', 'balance', 'total_spent', 'limit',  'status',
        'deleted_at', 'created_at', 'updated_at','deleted_by','created_by','updated_by'];
    protected $appends = ['status_formatted'];

    public function getStatusFormattedAttribute()
    {
        return match($this->status){
            1 => 'Approved',
            2 => 'Pending',
            3 => 'Disable',
            4 => 'Close',
            default => 'Unknown',
        };
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
