<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [FilmController::class, 'index'])->name('home');
Route::get('/become-a-partner', [PartnerController::class, 'index'])->name('become-a-partner');

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/upload-film', [FilmController::class, 'uploadView'])->name('film.upload-view');
    Route::post('/upload-film', [FilmController::class, 'upload'])->name('film.upload');
});

Route::middleware('admin')->group(function () {
    Route::get('/add-user', [UserController::class, 'index'])->name('user.add-view');
    Route::post('/add-user', [UserController::class, 'store'])->name('user.add');
});

require __DIR__.'/auth.php';
