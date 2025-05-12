<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Backend\Role\RoleEdit;
use App\Livewire\Backend\User\UserEdit;
use App\Livewire\Backend\Role\RoleIndex;
use App\Livewire\Backend\User\UserIndex;
use App\Livewire\Backend\Role\RoleCreate;
use App\Livewire\Backend\User\UserCreate;
use App\Http\Controllers\ProfileController;
use App\Livewire\Backend\Dashboard\DashboardIndex;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    // Dasdhboard
    Route::get('/', DashboardIndex::class)->name('dashboard');
    
    
    // Manajemen User
    Route::get('/users', UserIndex::class)->name('user.index');
    Route::get('/users/tambah', UserCreate::class)->name('user.create');
    Route::get('/users/{id}/edit', UserEdit::class)->name('user.edit');

    // Manajemen Peran
    Route::get('/roles', RoleIndex::class)->name('role.index');
    Route::get('/roles/tambah', RoleCreate::class)->name('role.create');
    Route::get('/roles/{id}/edit', RoleEdit::class)->name('role.edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';