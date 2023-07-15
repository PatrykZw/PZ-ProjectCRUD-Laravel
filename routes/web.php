<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Test;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;

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
Route::get( '/', [WelcomeController::class, 'index'])->name('welcome');

    Route::middleware(['can:isAdmin'])->group(function() {
        Route::get( '/cars/{car}/download', [CarsController::class, 'downloadImage'])->name('Cars.downloadImage');
        Route::get( '/cars', [CarController::class, 'index'])->name('cars.index');
        Route::get( '/cars/create', [CarController::class, 'create'])->name('cars.create');
        Route::get( '/cars/{car}', [CarController::class, 'show'])->name('cars.show');
        Route::post( '/cars', [CarController::class, 'store'])->name('cars.store');
        Route::get( '/cars/edit/{car}', [CarController::class, 'edit'])->name('cars.edit');
        Route::get( '/cars/modify/{car}', [CarController::class, 'modify'])->name('cars.modify');
        Route::post( '/cars/{car}', [CarController::class, 'update'])->name('cars.update');
        Route::delete( '/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::get( '/users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::post( '/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::get( '/borrow/{car}', [WelcomeController::class, 'borrow'])->name('borrow');
Route::post( '/borrow/{car}', [WelcomeController::class, 'update'])->name('borrow.update');
Route::get( '/hello', [Test::class, 'show']);
Auth::routes(['verify' => true]);