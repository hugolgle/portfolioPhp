<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
    public function register(): void
    {
      //
    }

  /**
   * Bootstrap any application services.
   */
    public function boot(): void
    {
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);

        Vite::prefetch(concurrency: 3);
        Carbon::setLocale('fr');

        Route::middleware('web')
        ->group(base_path('routes/web.php'));

        Route::middleware('web') // avec auth/verified dedans
        ->group(base_path('routes/admin.php'));
    }
}
