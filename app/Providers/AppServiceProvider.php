<?php

namespace App\Providers;

use App\Models\CompanyContact;
use App\Models\CompanyInfo;
use App\Models\GoogleTag;
use App\Models\Page;
use App\Models\PixelTag;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        if (Schema::hasTable('company_infos')) {
            $site_info = CompanyInfo::first();
            $site_contact_info = CompanyContact::first();
            $cart_products = '';
            // if(serviceCheck('Database Add To Cart')){
            //     $user_ip = request()->ip();
            //     $cart_products = AddToCart::where('ip_address',$user_ip)->orderBy('id','desc')->get();
            //     if(Auth::user()){
            //         $cart_products = AddToCart::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
            //     }
            // }

            view()->share('cart_products', $cart_products);
            view()->share('site_info', $site_info);
            view()->share('site_contact_info', $site_contact_info);

            $n['pages'] = Page::all();
            // $n['google_tag'] = GoogleTag::first();
            // $n['pixel_tag'] = PixelTag::first();
            view()->share($n);
        }
        //    if(serviceCheck('Wishlist')){
        //     if( Schema::hasTable('wishlists')){
        //             $wishlists = null;
        //             if(Auth::user()){
        //                 $wishlists = Wishlist::where('user_id',Auth::user()->id)->get();
        //             }else{
        //                 $wishlists = Wishlist::where('ip_address',request()->ip())->get();
        //             }
        //             view()->share('wishlists',$wishlists);
        //         }
        //     }

        if (Schema::hasTable('google_tags')) {
            view()->share('google_tag', GoogleTag::where('status', 'active')->first());
        }
        if (Schema::hasTable('pixel_tags')) {
            view()->share('pixel_tag', PixelTag::where('status', 'active')->first());
        }
    }
}
