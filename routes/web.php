<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MailController;

// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

// Auth route
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [OrganizationController::class, 'index']);
    Route::get('/settings', [PageController::class, 'settings'])->name('settings');
    Route::get('/me', [PageController::class, 'me'])->name('me');

    Route::prefix('organizations')->group(function () {
        Route::get('/', [OrganizationController::class, 'index'])->name('organizations.all');
        Route::get('/create', [OrganizationController::class, 'create'])->name('organizations.create_form');
        Route::get('/{uk}/edit', [OrganizationController::class, 'edit'])->name('organizations.edit_form');
        Route::get('/{uk}', [OrganizationController::class, 'show'])->name('organizations.single');
        Route::get('/{uk}/child', [OrganizationController::class, 'showChild'])->name('organizations.child');
        Route::post('/', [OrganizationController::class, 'store'])->name('organizations.create');
        Route::put('/{uk}', [OrganizationController::class, 'update'])->name('organizations.edit');

        // User
        Route::get('/{uk}/users', [UserController::class, 'index'])->name('organizations.users');
        Route::get('/users/{user_id}/edit', [UserController::class, 'edit'])->name('organizations.users.edit_form');
        Route::put('/users/{user_id?}', [UserController::class, 'update'])->name('organizations.users.edit');
        Route::delete('/users/{user_id?}', [UserController::class, 'destroy'])->name('organizations.users.delete');

        // Roles
        Route::get('/{uk}/roles', [RoleController::class, 'index'])->name('organizations.roles');
        Route::get('/{uk}/roles/{role_id?}', [RoleController::class, 'show'])->name('organizations.roles.single');
    });
});

