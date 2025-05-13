<?php
use App\Http\Controllers\DevisController;
use App\Http\Controllers\PortfolioController;
use App\Http\Middleware\LogVisit;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'index'])
    ->middleware(LogVisit::class);

Route::post('/admin/services/devis', [DevisController::class, 'store'])->name('admin.devis.store');
