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

    Route::get('/admin', [HomeController::class, 'home']);
	
	Route::get('admin/dashboard', function () {
		return view('admin/dashboard');
	})->name('dashboard');

	Route::get('admin/broadcast', function () {
		return view('admin/broadcast');
	})->name('broadcast');

	Route::get('admin/event', function () {
		return view('admin/event');
	})->name('event');

	Route::get('admin/kategori', function () {
		return view('admin/kategori');
	})->name('kategori');

	Route::get('admin/informasi', function () {
		return view('admin/informasi');
	})->name('informasi');
	Route::get('/admin/dashboard', function () {
		return view('admin/dashboard');
	})->name('dashboard');

	Route::get('/admin/billing', function () {
		return view('admin/billing');
	})->name('billing');

	Route::get('/admin/user-management', function () {
		return view('admin/user-management');
	})->name('user-management');

	Route::get('/admin/broadcast', function () {
		return view('admin/broadcast');
	})->name('broadcast');

	Route::get('/admin/event', function () {
		return view('admin/event');
	})->name('event');

	Route::get('/admin/kategori', function () {
		return view('admin/kategori');
	})->name('kategori');

	Route::get('/admin/informasi', function () {
		return view('admin/informasi');
	})->name('informasi');



    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('admin/user-profile', [InfoUserController::class, 'create']);
	Route::post('user-profile', [InfoUserController::class, 'store']);
	Route::get('/admin/user-profile', [InfoUserController::class, 'create']);
	Route::post('/admin/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {

    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

// Route::group(['middleware' => 'user'], function () {
// 	Route::get('/', )
// })

Route::get('/admin/login', function () {
    return view('session/login-session');
})->name('login');