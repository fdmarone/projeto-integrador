<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GamesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Admin\GamesController as AdminGamesController;
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

Route::get('/', [GamesController::class, 'index'])->name('home');

Route::get('/dashboard', [GamesController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::get('/games', [GamesController::class, 'all'])
    ->middleware(['auth', 'verified'])
    ->name('games.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/games/{game}/favorite', [GamesController::class, 'toggleFavorite'])
        ->name('games.favorite');

    Route::get('/me/favorites', [GamesController::class, 'favorites'])
        ->name('me.favorites');

    Route::post('/games/{game}/rate', [GamesController::class, 'rate'])
        ->name('games.rate');
});



Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('dashboard.admin');

    Route::prefix('admin')->name('admin.')->group(function () {

        // Usuários
        Route::get('/users', [AdminUsersController::class, 'index'])->name('users.index');
        Route::get('/users/{user}/edit', [AdminUsersController::class, 'edit'])->name('users.edit');
        Route::patch('/users/{user}', [AdminUsersController::class, 'update'])->name('users.update');
        Route::patch('/users/{user}/toggle-admin', [AdminUsersController::class, 'toggleAdmin'])->name('users.toggleAdmin');
        Route::delete('/users/{user}', [AdminUsersController::class, 'destroy'])->name('users.destroy');

        // Jogos
        Route::get('/games', [AdminGamesController::class, 'index'])->name('games.index');
        Route::get('/games/create', [AdminGamesController::class, 'create'])->name('games.create');
        Route::post('/games', [AdminGamesController::class, 'store'])->name('games.store');
        Route::get('/games/{game}/edit', [AdminGamesController::class, 'edit'])->name('games.edit');
        Route::patch('/games/{game}', [AdminGamesController::class, 'update'])->name('games.update');
        Route::delete('/games/{game}', [AdminGamesController::class, 'destroy'])->name('games.destroy');
    });
});


require __DIR__ . '/auth.php';
