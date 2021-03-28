<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

// View
Route::get('/', [PageController::class, 'login']);

Route::get('/', [PageController::class, 'dashboard']);
Route::get('/settings', [PageController::class, 'settings']);

Route::prefix('organization')->group(function(){
    Route::get('/create', [PageController::class, 'create_organization']);
    Route::get('/{uk}', [PageController::class, 'single_organization']);
});

Auth::routes();

Route::get('/home', function(){
    // $role = Role::create(['name' => 'member']);
    // $role = Role::find(2);
    // $permission = Permission::find(4);
    // $role->givePermissionTo($permission);
    $user = User::find(1);
    // $user->assignRole('admin', 'member');
    $roles = Permission::all();
    $user->givePermissionTo($roles);
    // dd($roles);
    // $permissionNames = $user->getPermissionNames(); // collection of name strings
    // $permissions = $user->permissions;
    // dd($user);
});
