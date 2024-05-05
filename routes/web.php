<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TvController;
use App\Http\Controllers\AdminController;
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



Route::get('/test', function () {
    return view('landing');
});





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/wishlist', [PagesController::class, 'wishlist'])->name('wishlist');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin/settings');
    Route::post('/admin/settings', [AdminController::class, 'settings'])->name('admin/settings');

    Route::get('/admin/statistics', [AdminController::class, 'statistics'])->name('statistics');
    Route::post('/admin/statistics', [AdminController::class, 'statistics'])->name('statistics');

    Route::get('/admin/users', [AdminController::class, 'users'])->name('users');

});

require __DIR__.'/auth.php';


Route::get('/', [PagesController::class, 'index'])->name('/');


//  Route::get('/movies/page/{page?}',[MoviesController::class, 'movies']);
Route::get('movies', [MoviesController::class, 'movies'])->name('movies');
Route::get('/movie/{slug}/{id}', [MoviesController::class, 'show'])->name('movie.show');


Route::get('/tv/page/{page?}',[TvController::class, 'tv']);
Route::get('tv', [TvController::class, 'tv'])->name('tv');
Route::get('/tv/{slug}/{id}', [TvController::class, 'show'])->name('tv.show');

Route::get('/actors', [ActorsController::class, 'index'])->name('actors.index');
Route::get('/actors/{slug}/{id}', [ActorsController::class, 'show'])->name('actors.show');

Route::get('/search/{query?}',  [PagesController::class, 'search'])->name('search');

 Route::get('/toprated',  [PagesController::class, 'toprated'])->name('toprated');

Route::post('night-mode',  [PagesController::class, 'nightMode'])->name('settings');
// Route::post('background',  [PagesController::class, 'checkActiveBackground'])->name('background');

