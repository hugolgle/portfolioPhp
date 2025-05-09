<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'index']);
Route::prefix('admin')->group(function () {
  Route::get('/', [AdminController::class, 'admin'])->name('admin.admin');

  Route::prefix('about')->group(function () {
    Route::get('/', [AdminController::class, 'about'])->name('admin.about');
    Route::put('/update', [AboutController::class, 'update'])->name('admin.about.update');
  });

  Route::get('/skills', [AdminController::class, 'skills'])->name('admin.skills');

  Route::prefix('project')->group(function () {
    Route::get('/', action: [AdminController::class, 'project'])->name('admin.project');
    Route::get('/create', [ProjectController::class, 'create'])->name('admin.project.create'); // Route pour afficher le formulaire de création
    Route::post('/', [ProjectController::class, 'store'])->name('admin.project.store'); // Route pour enregistrer le projet
    Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('admin.project.edit'); // Route pour afficher le formulaire d'édition
    Route::put('/{project}', [ProjectController::class, 'update'])->name('admin.project.update'); // Route pour mettre à jour le projet
    Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('admin.project.destroy'); // Route pour supprimer le projet
  });
  Route::get('/contact', [AdminController::class, 'contact'])->name('admin.contact');
  Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
});


require __DIR__ . '/auth.php';

