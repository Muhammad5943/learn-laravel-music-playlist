<?php

use App\Http\Controllers\Band\AlbumController;
use App\Http\Controllers\Band\BandController;
use Illuminate\Support\Facades\{Auth, Route};
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

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

Auth::routes(/* ['veriry' => true] (Jika ingin menggunakan verify email) */);

Route::get('/', HomeController::class)->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::prefix('bands')->group(function () {
        // Band Store
        Route::get('create', [BandController::class, 'create'])->name('bands.create');
        Route::post('create', [BandController::class, 'store']);

        // Band Table
        Route::get('table', [BandController::class, 'table'])->name('bands.table');

        // Band Update
        Route::get('{band:slug}/edit', [BandController::class, 'edit'])->name('bands.edit');
        Route::put('{band:slug}/edit', [BandController::class, 'update']);

        //Band Destroy
        Route::delete('{band:slug}/delete', [BandController::class, 'destroy'])->name('bands.delete');
    });

    Route::prefix('albums')->group(function () {
        // Album Store
        Route::get('create', [AlbumController::class, 'create'])->name('albums.create');
        Route::post('create', [AlbumController::class, 'store']);

        // Album Table
        Route::get('table', [AlbumController::class, 'table'])->name('albums.table');
    });
});
