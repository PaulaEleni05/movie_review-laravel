<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\DirectorController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// The code below creates all Routes for reviews
Route::resource('reviews',ReviewController::class);

Route::post('movies/{movie}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

//Routes for Director 
Route::resource('directors',DirectorController::class)->middleware('auth');
Route::get('/directors', [DirectorController::class, 'index'])->name('directors.index');
Route::get('/directors/{director}', [DirectorController::class, 'show'])->name('directors.show');
Route::post('/directors', [DirectorController::class, 'store'])->name('directors.store');
Route::get('/directors/create', [DirectorController::class, 'create'])->name('directors.create');
Route::get('/directors/{director}/edit', [DirectorController::class, 'edit'])->name('directors.edit');
Route::patch('/directors/{director}', [DirectorController::class, 'update'])->name('directors.update');
Route::delete('/directors/{director}', [DirectorController::class, 'destroy'])->name('directors.destroy');

//Routes for Movies
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
Route::patch('/movies/{movie}', [MovieController::class, 'update'])->name('movies.update');
Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');


