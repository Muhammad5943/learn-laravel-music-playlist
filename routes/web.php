<?php

use Illuminate\Support\Facades\{Auth, Route};
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Band\AlbumController;
use App\Http\Controllers\Band\BandController;
use App\Http\Controllers\Band\GenreController;

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

        // Album Edit
        Route::get('{album:slug}/edit', [AlbumController::class, 'edit'])->name('albums.edit');
        Route::put('{album:slug}/edit', [AlbumController::class, 'update']);

        // Album Destroy
        Route::delete('{album:slug}/delete', [AlbumController::class, 'destroy'])->name('albums.delete');
    });

    Route::prefix('genres')->group(function () {
        // Genre Store
        Route::get('create', [GenreController::class, 'create'])->name('genres.create');
        Route::post('create', [GenreController::class, 'store']);

        // Genre Table
        Route::get('table', [GenreController::class, 'table'])->name('genres.table');

        // Genre Update
        Route::get('{genre:slug}', [GenreController::class, 'edit'])->name('genres.edit');
        Route::put('{genre:slug}', [GenreController::class, 'update']);
    });
});
