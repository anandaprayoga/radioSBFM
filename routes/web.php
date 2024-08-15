<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\VisitorHomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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

Route::get('visitor/visitor-home', [VisitorHomeController::class, 'index'])->name('visitor/visitor-home');
Route::get('/', function () {
	return view('visitor/dashboard');
});
Route::get('/category', function () {
	return view('visitor/category');
});
Route::get('/contact', function () {
	return view('visitor/contact');
});
Route::get('/berita', function () {
	return view('visitor/berita');
});
Route::get('/about', function () {
	return view('visitor/about');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin', [HomeController::class, 'home'])->middleware('ip.whitelist');
	Route::get('/admin/dashboard', function () {
		return view('admin/dashboard');
	})->name('dashboard')->middleware('ip.whitelist');

	Route::get('/admin/billing', function () {
		return view('admin/billing');
	})->name('billing')->middleware('ip.whitelist');

	Route::get('/admin/user-management', function () {
		return view('admin/user-management');
	})->name('user-management')->middleware('ip.whitelist');

	Route::get('/admin/broadcast', function () {
		return view('admin/broadcast');
	})->name('broadcast')->middleware('ip.whitelist');

	Route::get('/admin/event', function () {
		return view('admin/event');
	})->name('event')->middleware('ip.whitelist');

	Route::get('/admin/kategori', function () {
		return view('admin/kategori');
	})->name('kategori')->middleware('ip.whitelist');

	Route::get('/admin/informasi', function () {
		return view('admin/informasi');
	})->name('informasi')->middleware('ip.whitelist');



    Route::get('/logout', [SessionsController::class, 'destroy'])->middleware('ip.whitelist');
	Route::get('admin/user-profile', [InfoUserController::class, 'create'])->middleware('ip.whitelist');
	Route::post('user-profile', [InfoUserController::class, 'store'])->middleware('ip.whitelist');
	Route::get('/admin/user-profile', [InfoUserController::class, 'create'])->middleware('ip.whitelist');
	Route::post('/admin/user-profile', [InfoUserController::class, 'store'])->middleware('ip.whitelist');
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up')->middleware('ip.whitelist');
});



Route::group(['middleware' => 'guest'], function () {

    Route::get('/register', [RegisterController::class, 'create'])->middleware('ip.whitelist');
    Route::post('/register', [RegisterController::class, 'store'])->middleware('ip.whitelist');
    Route::get('/login', [SessionsController::class, 'create'])->middleware('ip.whitelist');
    Route::post('/session', [SessionsController::class, 'store'])->middleware('ip.whitelist');
	Route::get('/login/forgot-password', [ResetController::class, 'create'])->middleware('ip.whitelist');
	Route::post('/forgot-password', [ResetController::class, 'sendEmail'])->middleware('ip.whitelist');
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset')->middleware('ip.whitelist');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update')->middleware('ip.whitelist');

});

// Route::group(['middleware' => 'user'], function () {
// 	Route::get('/', )
// })

Route::get('/admin/login', function () {
    return view('session/login-session');
})->name('login')->middleware('ip.whitelist');

Route::get('/unauthorized', function () {
    return view('errors.unauthorized');
})->name('unauthorized');