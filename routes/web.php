<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Landing page - Display a listing of cars.
 *
 * @group Welcome
 * @response \Illuminate\View\View
 */
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

/**
 * Car routes - Requires 'isAdmin' middleware.
 */
Route::middleware(['can:isAdmin'])->group(function() {

    /**
     * Download image of a car.
     *
     * @group Cars
     * @urlParam car integer required The ID of the car.
     * @response \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    Route::get('/cars/{car}/download', [CarsController::class, 'downloadImage'])->name('Cars.downloadImage');

    /**
     * Display a listing of cars.
     *
     * @group Cars
     * @response \Illuminate\View\View
     */
    Route::get('/cars', [CarController::class, 'index'])->name('cars.index');

    /**
     * Display the form for creating a new car.
     *
     * @group Cars
     * @response \Illuminate\View\View
     */
    Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');

    /**
     * Display the specified car.
     *
     * @group Cars
     * @urlParam car integer required The ID of the car.
     * @response \Illuminate\View\View
     */
    Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

    /**
     * Store a newly created car in storage.
     *
     * @group Cars
     * @response \Symfony\Component\HttpFoundation\RedirectResponse
     */
    Route::post('/cars', [CarController::class, 'store'])->name('cars.store');

    /**
     * Display the form for editing the specified car.
     *
     * @group Cars
     * @urlParam car integer required The ID of the car.
     * @response \Illuminate\View\View
     */
    Route::get('/cars/edit/{car}', [CarController::class, 'edit'])->name('cars.edit');

    /**
     * Display the form for modifying the specified car.
     *
     * @group Cars
     * @urlParam car integer required The ID of the car.
     * @response \Illuminate\View\View
     */
    Route::get('/cars/modify/{car}', [CarController::class, 'modify'])->name('cars.modify');

    /**
     * Update the specified car in storage.
     *
     * @group Cars
     * @urlParam car integer required The ID of the car.
     * @response \Symfony\Component\HttpFoundation\RedirectResponse
     */
    Route::post('/cars/{car}', [CarController::class, 'update'])->name('cars.update');

    /**
     * Remove the specified car from storage.
     *
     * @group Cars
     * @urlParam car integer required The ID of the car.
     * @response \Symfony\Component\HttpFoundation\JsonResponse
     */
    Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');

    /**
     * Display a listing of users.
     *
     * @group Users
     * @response \Illuminate\View\View
     */
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    /**
     * Display the form for creating a new user.
     *
     * @group Users
     * @response \Illuminate\View\View
     */
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

    /**
     * Display the specified user.
     *
     * @group Users
     * @urlParam user integer required The ID of the user.
     * @response \Illuminate\View\View
     */
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

    /**
     * Store a newly created user in storage.
     *
     * @group Users
     * @response \Symfony\Component\HttpFoundation\RedirectResponse
     */
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    /**
     * Display the form for editing the specified user.
     *
     * @group Users
     * @urlParam user integer required The ID of the user.
     * @response \Illuminate\View\View
     */
    Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');

    /**
     * Update the specified user in storage.
     *
     * @group Users
     * @urlParam user integer required The ID of the user.
     * @response \Symfony\Component\HttpFoundation\RedirectResponse
     */
    Route::post('/users/{user}', [UserController::class, 'update'])->name('users.update');

    /**
     * Remove the specified user from storage.
     *
     * @group Users
     * @urlParam user integer required The ID of the user.
     * @response \Symfony\Component\HttpFoundation\JsonResponse
     */
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

});

/**
 * Borrow a car.
 *
 * @group Borrow
 * @urlParam car integer required The ID of the car to borrow.
 * @response \Illuminate\View\View
 */
Route::get('/borrow/{car}', [WelcomeController::class, 'borrow'])->name('borrow');

/**
 * Update the specified car after borrowing.
 *
 * @group Borrow
 * @urlParam car integer required The ID of the borrowed car.
 * @response \Symfony\Component\HttpFoundation\RedirectResponse
 */
Route::post('/borrow/{car}', [WelcomeController::class, 'update'])->name('borrow.update');

/**
 * Authentication routes (with verification).
 *
 * @group Authentication
 * @response \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
 */
Auth::routes(['verify' => true]);