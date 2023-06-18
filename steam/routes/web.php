<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\TransaksiController;
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


Route::get('loginform', [AuthController::class, 'loginform'])->name('loginform');
Route::get('/', [AdminController::class, 'index'])->name('welcome');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('koleksi', [GameController::class, 'koleksi'])->name('koleksi');
});

Route::post('add-game', [AdminController::class, 'storeGame'])->name('add-game');
Route::get('show-add-game', [AdminController::class, 'showAddGame'])->name('showAddGame');
Route::get('dashboard', [AdminController::class, 'dash'])->name('index-game');

Route::get('game/{id}', [GameController::class, 'showGame'])->name('game.show');

Route::get('buy/{game_id}', [TransaksiController::class, 'buy'])->name('buy');
Route::post('buy/{game_id}', [TransaksiController::class, 'processBuy'])->name('processBuy');


Route::post('transaksi/{game}', [TransaksiController::class, 'storeTransaksi'])->name('storeTransaksi');
Route::get('/transaksi/{transaksi_id}', [TransaksiController::class, 'show'])->name('transaksi.show');