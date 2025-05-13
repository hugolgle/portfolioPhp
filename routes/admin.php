<?php

use App\Http\Controllers\DevisController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PreferenceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AdminController::class, 'admin'])->name('admin');

    Route::prefix('about')->group(function () {
        Route::get('/', [AdminController::class, 'about'])->name('admin.about');
        Route::put('/update', [AboutController::class, 'update'])->name('admin.about.update');
    });

    Route::prefix('project')->group(function () {
        Route::get('/', [AdminController::class, 'project'])->name('admin.project');
        Route::get('/create', [ProjectController::class, 'create'])->name('admin.project.create');
        Route::post('/', [ProjectController::class, 'store'])->name('admin.project.store');
        Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('admin.project.edit');
        Route::put('/{project}', [ProjectController::class, 'update'])->name('admin.project.update');
        Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('admin.project.destroy');
    });

    Route::prefix('services')->group(function () {
        Route::get('/', [AdminController::class, 'services'])->name('admin.services');
        Route::get('/create', [ServiceController::class, 'create'])->name('admin.services.create');
        Route::post('/', [ServiceController::class, 'store'])->name('admin.services.store');
        Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
        Route::put('/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
        Route::put('/{service}/visibility', [ServiceController::class, 'updateVisibility'])->name('admin.services.updateVisibility');
        Route::delete('/{service}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');
        Route::prefix(prefix: 'devis')->group(function () {
            Route::get('/', [AdminController::class, 'devis'])->name('admin.services.devis');
            Route::delete('/{devis}', [DevisController::class, 'destroy'])->name('admin.devis.destroy');
        });
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('admin.profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('admin.profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
    });

    Route::get('/contact', [AdminController::class, 'contact'])->name('admin.contact');
    Route::prefix('preferences')->group(function () {
        Route::get('/', [PreferenceController::class, 'show'])->name('admin.preferences');
        Route::put('preferences', [PreferenceController::class, 'update'])->name('admin.preferences.update');
    });

});

require __DIR__ . '/auth.php';
