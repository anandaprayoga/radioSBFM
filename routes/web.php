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
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\JadwalSiaranController;

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

// Route::get('/', [InformasiController::class, 'dashboard'])->name('informasis.dashboard')->middleware('ip.whitelist');
Route::get('/', [UserDashboardController::class, 'indexUser'])->name('visitor.indexUser');
Route::get('/berita/{id}', [UserDashboardController::class, 'detailInformasi'])->name('berita.detail');
Route::get('/category/{id}', [UserDashboardController::class, 'showCategoryNews'])->name('category.news');
Route::get('/search', [UserDashboardController::class, 'search']);
Route::get('/category', function () {
	return view('visitor/category');
});
Route::get('/contact', function () {
	return view('visitor/contact');
});
Route::get('/berita', function () {
	return view('visitor/berita');
});
Route::get('/about', [UserDashboardController::class, 'indexabout'])->name('visitor.indexabout');
Route::get('/radio', [UserDashboardController::class, 'indexradio'])->name('visitor.indexradio');
Route::get('/galeri', [GaleriController::class, 'index1'])->name('admin.insertAdmin');

Route::group(['middleware' => 'auth'], function () {

	Route::get('/admin', [HomeController::class, 'home'])->middleware('ip.whitelist');
	Route::get('/admin/dashboard', function () {
		return view('admin/dashboard');
	})->name('dashboard')->middleware('ip.whitelist');
	Route::get('/admin/broadcaster', [BroadcasterController::class, 'index'])->name('broadcasters.index')->middleware('ip.whitelist');
	Route::get('/admin/event', [EventController::class, 'index'])->name('events.index')->middleware('ip.whitelist');
	Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('kategoris.index')->middleware('ip.whitelist');
	Route::get('/admin/informasi', [InformasiController::class, 'index'])->name('informasis.index')->middleware('ip.whitelist');
	Route::get('/admin/galeri', [GaleriController::class, 'index'])->name('galeris.index')->middleware('ip.whitelist');
	Route::get('/admin/admin', [AdminController::class, 'index'])->name('admins.index')->middleware('ip.whitelist');
	Route::get('/admin/jadwalsiaran', [JadwalsiaranController::class, 'index'])->name('jadwalsiaran.index')->middleware('ip.whitelist');

	Route::get('/logout', [SessionsController::class, 'destroy'])->middleware('ip.whitelist');
	Route::get('admin/user-profile', [InfoUserController::class, 'create'])->middleware('ip.whitelist');
	Route::post('user-profile', [InfoUserController::class, 'store'])->middleware('ip.whitelist');
	Route::get('/admin/user-profile', [InfoUserController::class, 'create'])->middleware('ip.whitelist');
	Route::post('/admin/user-profile', [InfoUserController::class, 'store'])->middleware('ip.whitelist');
	Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up')->middleware('ip.whitelist');
});
Route::middleware('peran:Superadmin')->group(function() {
	Route::get('/admin/admin', [AdminController::class, 'index'])->name('admins.index');
	Route::post('/admin/insert', [AdminController::class, 'insertAdmin'])->name('admin.insertAdmin');
	Route::delete('/admin/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
	Route::put('/admin/admin/{id}', [AdminController::class, 'update'])->name('admin.update');
	
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
Route::post('/admin/broadcaster/updateStatus/{id}', [BroadcasterController::class, 'updateStatus'])->name('admin.broadcaster.updateStatus');


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

Route::post('/jadwalsiaran/insert', [JadwalSiaranController::class, 'insertJadwal'])->name('jadwalsiaran.insertJadwal');
Route::delete('/admin/jadwalsiaran/{id}', [JadwalSiaranController::class, 'destroy'])->name('jadwalsiaran.destroy');
Route::put('/admin/jadwalsiaran/{id}', [JadwalSiaranController::class, 'update'])->name('jadwalsiaran.update');
