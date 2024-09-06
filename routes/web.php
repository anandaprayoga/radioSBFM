<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\VisitorHomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BroadcasterController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [InformasiController::class, 'dashboard'])->name('informasis.dashboard')->middleware('ip.whitelist');
Route::get('/', [EventController::class, 'index1']);
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
Route::get('/search', function () {
	return view('visitor/search');
});
Route::get('/radio', function () {
	return view('visitor/radio');
});
Route::get('/galeri', function () {
	return view('visitor/galeri');
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

	Route::get('/admin/broadcaster', [BroadcasterController::class, 'index'])->name('broadcasters.index')->middleware('ip.whitelist');
	Route::get('/admin/event', [EventController::class, 'index'])->name('events.index')->middleware('ip.whitelist');
	Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('kategoris.index')->middleware('ip.whitelist');
	Route::get('/admin/informasi', [InformasiController::class, 'index'])->name('informasis.index')->middleware('ip.whitelist');
	Route::get('/admin/galeri', [GaleriController::class, 'index'])->name('galeris.index')->middleware('ip.whitelist');
	Route::get('/admin/admin', [AdminController::class, 'index'])->name('admins.index')->middleware('ip.whitelist');

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

Route::post('/user-profile/update-photo', [ProfileController::class, 'updatePhoto'])->name('user-profile.updatePhoto');

Route::post('/broadcaster/insert', [BroadcasterController::class, 'insertBroadcaster'])->name('broadcaster.insertBroadcaster');
Route::delete('/admin/broadcaster/{id}', [BroadcasterController::class, 'destroy'])->name('broadcaster.destroy');
Route::put('/admin/broadcaster/{id}', [BroadcasterController::class, 'update'])->name('broadcaster.update');

Route::post('/kategori/insert', [KategoriController::class, 'insertKategori'])->name('kategori.insertKategori');
Route::delete('/admin/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
Route::put('/admin/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');

Route::post('/event/insert', [EventController::class, 'insertEvent'])->name('event.insertEvent');
Route::delete('/admin/event/{id}', [EventController::class, 'destroy'])->name('event.destroy');
Route::put('/admin/event/{id}', [EventController::class, 'update'])->name('event.update');

Route::post('/informasi/insert', [InformasiController::class, 'insertInformasi'])->name('informasi.insertInformasi');
Route::delete('/admin/informasi/{id}', [InformasiController::class, 'destroy'])->name('informasi.destroy');
Route::put('/admin/informasi/{id}', [InformasiController::class, 'update'])->name('informasi.update');

Route::post('/galeri/insert', [GaleriController::class, 'insertGaleri'])->name('galeri.insertGaleri');
Route::delete('/admin/galeri/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');
Route::put('/admin/galeri/{id}', [GaleriController::class, 'update'])->name('galeri.update');

Route::middleware('peran:Superadmin')->group(function() {
	Route::get('/admin/broadcaster', [BroadcasterController::class, 'index'])->name('broadcasters.index');
	Route::get('/admin/event', [EventController::class, 'index'])->name('events.index');
	Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('kategoris.index');
	Route::get('/admin/informasi', [InformasiController::class, 'index'])->name('informasis.index');
	Route::get('/admin/galeri', [GaleriController::class, 'index'])->name('galeris.index');
	Route::get('/admin/admin', [AdminController::class, 'index'])->name('admins.index');
	Route::post('/admin/insert', [AdminController::class, 'insertAdmin'])->name('admin.insertAdmin');
	Route::delete('/admin/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
	Route::put('/admin/admin/{id}', [AdminController::class, 'update'])->name('admin.update');
});