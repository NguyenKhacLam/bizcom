<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\MailController;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
Route::get('/', [OrganizationController::class, 'index']);
Route::get('/settings', [PageController::class, 'settings']);

Route::middleware(['auth'])->group(function () {
    Route::resources([
        'organization' => 'App\Http\Controllers\OrganizationController',
        'organization/{uk}/roles' => 'App\Http\Controllers\RoleController',
    ]);
});

Auth::routes();

Route::get('mail', [MailController::class, 'sendMail']);
