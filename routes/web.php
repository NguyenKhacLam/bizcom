<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

// View
Route::get('/', [PageController::class, 'login']);

Route::get('/', [PageController::class, 'dashboard']);
Route::get('/settings', [PageController::class, 'settings']);

Route::prefix('organization')->group(function(){
    Route::get('/create', [PageController::class, 'create_organization']);
    Route::get('/{uk}', [PageController::class, 'single_organization']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
