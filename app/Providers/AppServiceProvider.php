<?php

namespace App\Providers;

use App\Domain\Activity\Entities\Breakfast;
use App\Domain\Activity\Observers\BreakfastObserver;
use Illuminate\Support\ServiceProvider;
use App\Domain\User\Entities\User;
use App\Domain\User\Observers\UserObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Breakfast::observe(BreakfastObserver::class);
    }
}
