<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Member\MembershipController;
use App\Http\Middleware\RedirectIfNotMember;
use App\Http\Controllers\Member\PaymentController;
use App\Http\Controllers\PaymentCompleteController;
use App\Http\Controllers\StripeWebhookController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', LogoutController::class)->name('logout');

Route::middleware([RedirectIfNotMember::class])->group(function () {
	Route::get('/members', MembershipController::class)->name('members');
});

Route::get('/payments', PaymentController::class);
Route::post('/payments/redirect', PaymentCompleteController::class);

Route::post('/webhooks/stripe', StripeWebhookController::class);

