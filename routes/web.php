<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Accueil public
Route::get('/', [PortfolioController::class, 'index']);

// Admin
Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
  Route::get('/', function () {
    return view('dashboard');
  })->name('admin');

  Route::prefix('about')->group(function () {
    Route::get('/', [AdminController::class, 'about'])->name('admin.about');
    Route::put('/update', [AboutController::class, 'update'])->name('admin.about.update');
  });

  Route::get('/skills', [AdminController::class, 'skills'])->name('admin.skills');

  Route::prefix('project')->group(function () {
    Route::get('/', [AdminController::class, 'project'])->name('admin.project');
    Route::get('/create', [ProjectController::class, 'create'])->name('admin.project.create');
    Route::post('/', [ProjectController::class, 'store'])->name('admin.project.store');
    Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('admin.project.edit');
    Route::put('/{project}', [ProjectController::class, 'update'])->name('admin.project.update');
    Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('admin.project.destroy');
  });

  Route::get('/contact', [AdminController::class, 'contact'])->name('admin.contact');
  Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');

  // Profile (Admin routes)
  Route::prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
  });
});

// Auth routes (Breeze)
require __DIR__ . '/auth.php';
