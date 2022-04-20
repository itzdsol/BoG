<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/cache-clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return Redirect::back()->with('success', 'All cache cleared successfully.');
});

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', [App\Http\Controllers\LandingController::class, 'index']);

Route::group(['middleware' => ['guest']], function () {
    Route::get('/contractor/register', [App\Http\Controllers\LandingController::class, 'contractor_signup'])->name('contractor.signup');
    Route::get('/vendor/register', [App\Http\Controllers\LandingController::class, 'vendor_signup'])->name('vendor.signup');
});

Auth::routes();

Route::get('login/{provider}', [App\Http\Controllers\SocialController::class, 'redirect'])->name('redirect');
Route::get('auth/{provider}/callback', [App\Http\Controllers\SocialController::class, 'callback'])->name('callback');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('2fa');
  
Route::get('2fa', [App\Http\Controllers\TwoFAController::class, 'index'])->name('2fa.index');
Route::post('2fa', [App\Http\Controllers\TwoFAController::class, 'store'])->name('2fa.post');
Route::get('2fa/resend', [App\Http\Controllers\TwoFAController::class, 'resend'])->name('2fa.resend');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::any('dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::any('orders', [App\Http\Controllers\AdminController::class, 'orders'])->name('admin.orders');
    
    Route::any('products', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.products');
    Route::any('product/add', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.product.add');
    Route::any('store-product', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin.product.store');
    Route::any('product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'editProduct'])->name('admin.product.edit');
    Route::any('update-product', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.product.update');
    Route::any('view-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'show'])->name('ViewFaq');
    Route::any('delete-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('admin.proudct.delete');
});
