<?php

namespace App\Providers;

use App\Models\Paste;
use App\Services\AuthService;
use App\Services\interfaces\AuthServiceInterface;
use App\Services\interfaces\PasteServiceInterface;
use App\Services\PasteService;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    public function boot(Request $request): void
    {
        Paginator::defaultView('vendor.pagination.bootstrap-5');

        view()->composer('*', function ($view)
        {
            View::share('publicPastes', Paste::where('access_restriction', 1)->orderByDesc('created_at')->limit(10)->get());

            if(Auth::user()) {
                $personalPastes = Paste::where('user_id', Auth::user()->id)->orderByDesc('created_at')->limit(10)->get();
                View::share('personalPastes', $personalPastes );
            }
        });
    }
}
