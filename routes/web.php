<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OrganizationController;

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

Route::resources([
    'organization' => 'App\Http\Controllers\OrganizationController'
]);

Auth::routes();

Route::get('users/{id}', function ($id) {
    $user = User::find($id)->organizations();
    dd($user);
});
