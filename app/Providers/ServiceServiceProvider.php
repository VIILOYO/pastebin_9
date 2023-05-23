<?php

namespace App\Providers;

use App\Services\AuthService;
use App\Services\interfaces\AuthServiceInterface;
use App\Services\interfaces\PasteServiceInterface;
use App\Services\PasteService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    public array $bindings = [
        PasteServiceInterface::class => PasteService::class,
        AuthServiceInterface::class => AuthService::class,
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
