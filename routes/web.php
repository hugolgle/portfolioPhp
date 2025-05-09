<?php
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

// Accueil public
Route::get('/', [PortfolioController::class, 'index']);

