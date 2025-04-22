<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;


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
        Gate::define('ver-admin', function (User $user){
            return $user->rol ==='admin';
        });

        Gate::define('ver-productos', function (User $user){
            return in_array($user->rol, ['admin', 'comercial', 'supervisor']);
        });

        Gate::define('ver-compras', function (User $user){
            return in_array($user->rol, ['admin', 'comercial', 'supervisor']);
        });

        Gate::define('ver-inventarios', function (User $user){
            return in_array($user->rol, ['admin', 'comercial', 'supervisor']);
        });

        Gate::define('ver-clientes', function (User $user){
            return in_array($user->rol, ['admin', 'comercial', 'supervisor']);
        });

        Gate::define('ver-ventas', function (User $user){
            return in_array($user->rol, ['operador', 'supervisor']);
        });

    }
}
