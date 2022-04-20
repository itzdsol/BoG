<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Route::group(['middleware' => 'firebase.token'], function(){
    Route::post('authentication',[UserController::class, 'signup']);
    //Route::post('login',[UserController::class, 'login']);
    //Route::post('register', [UserController::class, 'register']);
//});

Route::post('authentication/email',[UserController::class, 'emailsignup']);
Route::post('email/verify',[UserController::class, 'email_verify']);
Route::post('resend/email/otp',[UserController::class, 'resend_email_otp']);

Route::post('email/check',[UserController::class, 'email_check']);
Route::post('send/otp',[UserController::class, 'send_otp']);

Route::post('password/reset/otp/verify',[UserController::class, 'otp_verify']);
Route::post('reset/password',[UserController::class, 'reset_password']);