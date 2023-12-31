<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserGameController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::get('/game', [GameController::class, 'index'])->name('game');
Route::post('/save-pgn', [GameController::class, 'savePgn']);


Route::resource('/posts', PostController::class);
Route::resource('/users', UserGameController::class);

Route::get('/users/{user}/games', [UserGameController::class, 'games'])->name('user.games');
Route::get('/games/{game}', [GameController::class, 'show'])->name('game.show');



require __DIR__.'/auth.php';
