<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Users;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\API\AuthController;

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

Route::get('/divya', function () {
    return view('signup');
});
Route :: get ('emp/{name?}', function ($name = 'Guest') {
    echo $name;
});

//Route::get('/echo', function (\Illuminate\Http\Request $request) {
//    return $request->get('key');
//});
Route::resource('my','MyController');

//Route::get('/add/Route::resource('my','MyController');{num}/{num2}', function ($num1, $num2) {
   // $c = $num1+$num2;
//    echo "addition will happen here";
   // return $c;
//});
//Route::get('/Users', [Users::class, 'index']);

//Route::get('/loginpage', function () {
   // return view('loginpage');});



//Route::get('/totaladmin', [AdminController::class, 'index']);

//Route::post("/registration", [AdminController::class, 'store']);

//Route::get("/sendotp", [AdminController::class,'sendOtp']);

Route::get("/request_otp", [AuthController::class,'requestOtp']);


Route::get("/verify_otp", [AuthController::class,'verify_otp']);


//Route::post('request_otp', 'AuthController@requestOtp');



Route::get('/testemail', [JobController::class, 'processQueue']);
Route::get('/test/purchase', 'OtpController@confirmationPage');
Route::post('/test/otp-request', 'OtpController@requestForOtp')->name('requestForOtp');
Route::post('/test/otp-validate', 'OtpController@validateOtp')->name('validateOtp');
Route::post('/test/otp-resend', 'OtpController@resendOtp')->name('resendOtp');

