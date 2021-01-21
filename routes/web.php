<?php

use Illuminate\Support\Facades\{Auth, Route};
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Band\AlbumController;
use App\Http\Controllers\Band\BandController;
use App\Http\Controllers\Band\GenreController;
use App\Http\Controllers\Band\LyricController;

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

        // API for getAlbumByBandId
        Route::get('/get-album-by-{band}', [AlbumController::class, 'getAlbumsByBandId']);
    });

    Route::prefix('genres')->group(function () {
        // Genre Store
        Route::get('create', [GenreController::class, 'create'])->name('genres.create');
        Route::post('create', [GenreController::class, 'store']);

        // Genre Table
        Route::get('table', [GenreController::class, 'table'])->name('genres.table');

        // Genre Update
        Route::get('{genre:slug}/edit', [GenreController::class, 'edit'])->name('genres.edit');
        Route::put('{genre:slug}/edit', [GenreController::class, 'update']);

        // Genre Delete
        Route::delete('{genre:slug}/delete', [GenreController::class, 'destroy'])->name('genres.delete');
    });

    Route::prefix('lyrics')->group(function () {
        // Lyrics Create
        Route::get('create', [LyricController::class, 'create'])->name('lyrics.create');
        Route::post('create', [LyricController::class, 'store']);

        // Lyrics Table
        Route::get('table', [LyricController::class, 'table'])->name('lyrics.table');
        Route::get('data-table', [LyricController::class, 'dataTable'])->name('lyrics.datatable');

        // Lyrics Update
        Route::get('{lyric:slug}/edit', [LyricController::class, 'edit'])->name('lyrics.edit');
        Route::put('{lyric:slug}/edit', [LyricController::class, 'update']);

        // Lyrics Delete
        Route::delete('{lyric:slug}/delete', [LyricController::class, 'destroy'])->name('lyrics.delete');
    });
});
