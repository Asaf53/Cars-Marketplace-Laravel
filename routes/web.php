<?php

use App\Http\Controllers\AddCarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ViewCarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/profile', function () {
    return view('home');
})->middleware('verified');

Route::get('/addcar', [AddCarController::class, 'index'])->middleware('user')->name('addcar');
Route::get('model/{id}', [AddCarController::class, 'modelss']);

Route::post('store', [AddCarController::class, 'storeCar'])->middleware('verified')->name('storeCar');

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::resource('profiles', ProfileController::class);
Route::resource('cars', ViewCarController::class);

Route::get('model/{id}', [HomeController::class, 'modelss']);
