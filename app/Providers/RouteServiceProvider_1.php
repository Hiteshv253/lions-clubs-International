<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider {

      /**
       * The path to your application's "home" route.
       *
       * Typically, users are redirected here after authentication.
       *
       * @var string
       */
      public const HOME = '/dashboard-ecommerce';

      /**
       * Define your route model bindings, pattern filters, and other route configuration.
       */
      protected $backendModuleNamespace = 'Http\Controllers\Backend';
      protected $frontendModuleNamespace = 'Http\Controllers\Frontend';
      protected $apiModuleNamespace = 'Http\Controllers\Api';

      public function boot(): void {

            /* RateLimiter::for('api', function (Request $request) {
              return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
              });

              $this->routes(function () {
              Route::middleware('api')
              ->prefix('api')
              ->group(base_path('routes/api.php'));

              Route::middleware('web')
              ->group(base_path('routes/web.php'))
              ->group(base_path('routes/backend.php'));
              });

             */
            $this->mapWebRoutes();
            $this->mapWebBackendRoutes();
            $this->mapApiRoutes();
      }

      protected function mapWebRoutes() {
            Route::prefix('')
                  ->middleware('web')
                  ->namespace($this->frontendModuleNamespace)
                  ->group('routes/frontend.php');
      }

      protected function mapWebBackendRoutes() {
            Route::prefix('backend')
                  ->middleware('web')
                  ->namespace($this->backendModuleNamespace)
                  ->group('routes/backend.php');
      }

      /**
       * Define the "api" routes for the application.
       *
       * These routes are typically stateless.
       *
       * @return void
       */
      protected function mapApiRoutes() {
//            Route::prefix('api')
//                  ->middleware('api')
//                  ->namespace($this->apiModuleNamespace)
//                  ->group('/routes/api.php');
      }
}
