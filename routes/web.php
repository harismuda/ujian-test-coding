<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [FrontendController::class, 'index']);
Route::post('/storeTransaksi', [FrontendController::class, 'transaksi']);
Route::get('/total', [FrontendController::class, 'total']);
Route::get('/selesai/{id}', [FrontendController::class, 'selesai']);

Route::middleware(['guest'])->group(
    function () {
        Route::get('/login', [SesiController::class, 'index'])->name('login');
        Route::post('/masuk', [SesiController::class, 'masuk']);
        Route::get('/register', [SesiController::class, 'register']);
        Route::post('/register', [SesiController::class, 'store']);
    }
);
Route::middleware(['auth'])->group(
    function () {
        Route::get('/home', [SampahController::class, 'home']);
        Route::get('/sampah', [SampahController::class, 'index']);
        Route::get('/addSampah', [SampahController::class, 'create']);
        Route::post('/storeSampah', [SampahController::class, 'store']);
        Route::get('/editSampah/{id}', [SampahController::class, 'edit']);
        Route::post('/updateSampah', [SampahController::class, 'update']);
        Route::get('/deleteSampah/{id}', [SampahController::class, 'destroy']);

        Route::get('/JenisSampah', [JenisSampahController::class, 'index']);
        Route::get('/addJenisSampah', [JenisSampahController::class, 'create']);
        Route::post('/storeJenisSampah', [JenisSampahController::class, 'store']);
        Route::get('/editJenisSampah/{id}', [JenisSampahController::class, 'edit']);
        Route::post('/updateJenisSampah', [JenisSampahController::class, 'update']);
        Route::get('/deleteJenisSampah/{id}', [JenisSampahController::class, 'destroy']);
        Route::get('/logout', [SesiController::class, 'logout']);
    }
);