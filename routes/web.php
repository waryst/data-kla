<?php

use App\Http\Controllers\admin\KelanaController as AdminKelanaController;
use App\Http\Controllers\admin\RakapkelanaController;
use App\Http\Controllers\admin\RekapdekelaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\TahunController;
use App\Http\Controllers\admin\VerifikasiController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\operator\DekelaController;
use App\Http\Controllers\operator\KelanaController;

use App\Http\Controllers\operator\HomeController;
use App\Http\Controllers\operator\PassController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\UserDekelaController;
use App\Http\Controllers\UserKelanaController;

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


Route::get('/', function () {
    return view('operator.layout.main');
});



Route::get('file/{ket}/{file}', function ($ket, $file) {
    if ($ket == "Dekela") {

        return response()->download(storage_path('app/data/dekela/' . $file), $file);
    } else if ($ket == "Kelana") {

        return response()->download(storage_path('app/data/kelana/' . $file), $file);
    }
});

Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('revalidate');
Route::post('/', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::group(['middleware' => ['auth', 'checkRole:administrator', 'revalidate']], function () {
    Route::resource('verifikasi', VerifikasiController::class);
    Route::resource('tahun', TahunController::class)->name('index', 'dashboard');
    Route::resource('master_data', AdminKelanaController::class)->name('index', 'master_data');
    Route::resource('rekap_kelana', RakapkelanaController::class);
    Route::resource('rekap_dekela', RekapdekelaController::class);
    Route::get('detail_dekela/{id}', [RekapdekelaController::class, 'detail_dekela']);
    Route::resource('user-admin', UserAdminController::class);
    Route::post('user-admin/password/{id}', [UserAdminController::class, 'password']);
    Route::resource('user-kelana', UserKelanaController::class);
    Route::resource('user-dekela', UserDekelaController::class);
});


Route::group(['middleware' => ['auth', 'checkRole:kecamatan', 'revalidate']], function () {
    Route::resource('/kelana', KelanaController::class)->name('index', 'kelana');
    Route::get('/show_note/{id}', [KelanaController::class, 'note']);
});
Route::group(['middleware' => ['auth', 'checkRole:desa', 'revalidate']], function () {
    Route::resource('/dekela', DekelaController::class)->name('index', 'dekela');
    Route::get('/show_note_dekela/{id}', [DekelaController::class, 'note']);
});
Route::group(['middleware' => ['auth', 'checkRole:kecamatan,desa', 'revalidate']], function () {
    Route::post('/ganti_password', [PassController::class, 'ganti_password']);
});
