<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Cache;
use App\Models\Area;

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
        // Evita ejecutar este código cuando corres comandos Artisan en consola
        if ($this->app->runningInConsole()) {
            return;
        }

        try {
            // Asegura que la tabla exista (evita errores durante migraciones)
            if (Schema::hasTable('areas')) {
                View::composer('*', function ($view) {
                    // Carga las áreas con los libros relacionados (ajusta 'libros' si tu relación se llama diferente)
                    $areas = Area::with('libros')->get();

                    // Si quieres cachear para mejorar rendimiento, descomenta la alternativa abajo
                    // $areas = Cache::remember('areas_with_libros', 3600, fn() => Area::with('libros')->get());

                    $view->with('areas', $areas);
                });
            }
        } catch (\Throwable $e) {
            // En caso de error con la BD (por ejemplo en despliegue), no lanzamos excepción
            // Puedes loguearlo si quieres: \Log::error($e->getMessage());
        }
    }
}
