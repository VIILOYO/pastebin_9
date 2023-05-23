<?php

namespace App\Providers;

use App\Repositories\AuthRepositoryEloquent;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use App\Repositories\PasteRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    public array $singletons = [
        PasteRepositoryInterface::class => PasteRepositoryEloquent::class,
        AuthRepositoryInterface::class => AuthRepositoryEloquent::class,
    ];
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
