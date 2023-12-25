<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TvController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/', [PagesController::class, 'index'])->name('/');


Route::get('/movies/page/{page?}',[MoviesController::class, 'movies']);
Route::get('movies', [MoviesController::class, 'movies'])->name('movies');
Route::get('/movies/{id?}', [MoviesController::class, 'show'])->name('movie.show');


Route::get('/tv/page/{page?}',[TvController::class, 'tv']);
Route::get('tv', [TvController::class, 'tv'])->name('tv');
Route::get('/tv/{id?}', [TvController::class, 'show'])->name('tv.show');

Route::get('/actors', [ActorsController::class, 'index'])->name('actors.index');
Route::get('/actors/page/{page?}',[ActorsController::class, 'index']);
Route::get('/actors/{id}', [ActorsController::class, 'show'])->name('actors.show');

Route::get('/search/{query?}',  [PagesController::class, 'search'])->name('search');
Route::get('stream/{slug}/{id}',  [PagesController::class, 'play'])->name('stream');
