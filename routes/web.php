<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CompanyDetailsController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ImageGalleryController;
use App\Http\Controllers\MainKeyController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\AdAccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route for  both
//Ajax CURD Option
Route::controller(AjaxController::class)->prefix('ajax')->name('ajax.')->group(function () {
    Route::get('/subcat', 'subcatFetch')->name('subcat');
    Route::post('/insert', 'store')->name('store');
    Route::post('/single/insert', 'singleStore')->name('singlestore');
    Route::post('/index', 'index')->name('index');
    Route::post('/edit', 'edit')->name('edit');
    Route::post('/delete', 'delete')->name('delete');
});

//admin routes
Route::group(['middleware' => ['auth']], function () {

    // Admin home
    Route::get('/', [HomeController::class, 'home'])->name('admin');


    //company details
    Route::get('company-details/index', [CompanyDetailsController::class, 'create'])->name('company-details.index');
    Route::get('company-details/index', [CompanyDetailsController::class, 'create'])->name('company-details.create');
    Route::post('company-details/store', [CompanyDetailsController::class, 'store'])->name('company-details.store');
    Route::get('company-details/edit/{id}', [CompanyDetailsController::class, 'edit'])->name('company-details.edit');
    Route::put('company-details/update', [CompanyDetailsController::class, 'update'])->name('company-details.update');
    Route::post('company-details/delete/{id}', [CompanyDetailsController::class, 'destroy'])->name('company-details.destroy');


    //Ad account Management
    Route::group(['as' => 'ad_account.', 'prefix' => 'ad-account'], function () {
        Route::get('/index', [AdAccountController::class, 'index'])->name('index');
        Route::post('/store', [AdAccountController::class, 'store'])->name('store');
        Route::put('/{id}/ajax-update', [AdAccountController::class, 'ajaxUpdate'])->name('ajaxUpdate');
        Route::post('/topup', [AdAccountController::class, 'topup'])->name('topup');
    });

    //Add Ballance to wallet Mangement
    Route::group(['as' => 'wallet.', 'prefix' => 'wallet'], function () {
        Route::get('/index', [WalletController::class, 'index'])->name('index');
        Route::post('balance/store', [WalletController::class, 'store'])->name('balance.store');
        Route::put('/{id}/ajax-update', [WalletController::class, 'ajaxUpdate'])->name('ajaxUpdate');
    });


    //Image Management
    Route::group(['as' => 'img.', 'prefix' => 'image'], function () {
        Route::get('/index', [ImageGalleryController::class, 'index'])->name('index');
        Route::get('/create', [ImageGalleryController::class, 'create'])->name('create');
        Route::post('/store', [ImageGalleryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ImageGalleryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ImageGalleryController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [ImageGalleryController::class, 'destroy'])->name('destroy');
    });

    //optimize clear
    Route::get('/optimize-clear', [SettingController::class, 'optimizeClear'])->name('optimize-clear');
    Route::get('/optimize', [SettingController::class, 'optimize'])->name('optimize');
    //Setting
    Route::group(['as' => 'setting.', 'prefix' => 'setting'], function () {

        //Features
        Route::resource('features', FeatureController::class)->names([
            'index' => 'feature.index',
            'create' => 'feature.create',
            'edit' => 'feature.edit',
            'store' => 'feature.store',
            'update' => 'feature.update',
            'destroy' => 'feature.destroy',
            'show' => 'feature.show',
        ]);

        //Site Setting
        Route::resource('site-setting', SiteSettingController::class)->names([
            'index' => 'site.index',
            'create' => 'site.create',
            'edit' => 'site.edit',
            'store' => 'site.store',
            'update' => 'site.update',
            'destroy' => 'site.destroy',
            'show' => 'site.show',
        ]);

        Route::prefix('setup')->name('setup.')->group(function () {
            // Services
            Route::resource('services', ServiceController::class);

            // Main Keys
            Route::resource('mainKey', MainKeyController::class)->names([
                'index' => 'key.index',
                'create' => 'key.create',
                'edit' => 'key.edit',
                'store' => 'key.store',
                'update' => 'key.update',
                'destroy' => 'key.destroy',
                'show' => 'key.show',
            ]);
        });

        //role
        Route::group(['as' => 'role.', 'prefix' => 'role'], function () {
            Route::get('/index', [SettingController::class, 'roleIndex'])->name('index');
            Route::get('/create/{id?}', [SettingController::class, 'roleCreate'])->name('create');
            Route::post('/store', [SettingController::class, 'roleStore'])->name('store');
            Route::get('/destroy/{id}', [SettingController::class, 'roleDestroy'])->name('destroy');
        });

        //user
        Route::group(['as' => 'user.', 'prefix' => 'user'], function () {
            Route::get('/index', [SettingController::class, 'userIndex'])->name('index');
            Route::get('/create/{id?}', [SettingController::class, 'userCreate'])->name('create');
            Route::post('/store', [SettingController::class, 'userStore'])->name('store');
            Route::get('/destroy/{id}', [SettingController::class, 'userDestroy'])->name('destroy');
        });


    });

    // Admin Review Management Routes
    Route::prefix('admin/reviews')->name('admin.reviews.')->middleware(['auth'])->group(function () {

        Route::get('/', [ReviewController::class, 'index'])->name('index');
        Route::get('/create', [ReviewController::class, 'create'])->name('create');
        Route::post('/store', [ReviewController::class, 'store'])->name('store');
        Route::get('/{review}/edit', [ReviewController::class, 'edit'])->name('edit');
        Route::put('/{review}', [ReviewController::class, 'update'])->name('update');
        Route::delete('/{review}', [ReviewController::class, 'destroy'])->name('destroy');
        Route::delete('/image/{id}', [ReviewController::class, 'deleteImage'])->name('deleteImage');
    });

    //Review Management
    Route::group(['as' => 'reviews.', 'prefix' => 'reviews'], function () {
        Route::get('/index', [ReviewController::class, 'index'])->name('index');
        Route::get('/create', [ReviewController::class, 'create'])->name('create');
        Route::post('/store', [ReviewController::class, 'store'])->name('store');
        Route::get('/edit/{review}', [ReviewController::class, 'edit'])->name('edit');
        Route::put('/update/{review}', [ReviewController::class, 'update'])->name('update');
        Route::delete('/destroy/{review}', [ReviewController::class, 'destroy'])->name('destroy');
    });





});


require __DIR__ . '/auth.php';
