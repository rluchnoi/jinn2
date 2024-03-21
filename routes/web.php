<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProductController;
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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/films', [FilmController::class, 'index'])->name('films');

Route::get('/films/{id}', [FilmController::class, 'show'])->name('film');