<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\ForgotPasswordController;

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

Route::get('/', function () {
    return view('welcome');
});

// To verify email
Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware('signed')
    ->name('verification.verify');

// To send email for verification
Route::get('/email/sendemailverification', [EmailVerificationController::class, 'send_verification_email'])
    ->middleware('api')
    ->name('verification.send');

// Forgot password
Route::get('/password/forgotpassword', [ForgotPasswordController::class, 'forgot_password'])
    ->middleware('api')
    ->name('password.sent');

// Form to reset password
Route::get('/reset-password/{token}', function ($token) {
    return view('password.reset', ['token' => $token]);
})->middleware('web')->name('password.reset');

// Reset password
Route::post('/reset-password', [ForgotPasswordController::class, 'reset_password'])
    ->middleware('web')
    ->name('password.update');
