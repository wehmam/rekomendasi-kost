<?php

use App\Http\Controllers\Backend\AuthLoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\KostController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});




Route::prefix('frontend')->group(function () {
    Route::get("/login", [AuthLoginController::class, 'index']);
    Route::post("/login", [AuthLoginController::class, 'loginPost']);
    Route::middleware(['auth'])->group(function() {
        Route::get("/", [DashboardController::class, 'index']);
        Route::post("/logout", [AuthLoginController::class, 'logout']);


        Route::get("/home", [FrontendController::class, 'index']);
        Route::get('/show/{id}', [FrontendController::class, 'show']);
        Route::get('/filter', [FrontendController::class, 'filterKost']);
    });
});

Route::prefix('backend')->group(function () {
    Route::get("/login", [AuthLoginController::class, 'index'])->middleware('guestAdmin');
    Route::post("/login", [AuthLoginController::class, 'loginPost']);
    Route::middleware(['authAdmin'])->group(function() {
        Route::resource('kost', KostController::class)->parameters(['kost' => 'id']);
        Route::resource('criteria', CriteriaController::class)->parameters(['criteria' => 'id']);
    });
});
