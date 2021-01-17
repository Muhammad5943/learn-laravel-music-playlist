<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\{Route, Auth};

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
