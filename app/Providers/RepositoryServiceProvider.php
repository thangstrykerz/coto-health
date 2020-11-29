<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
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
        $this->app->bind(\App\Domain\User\Contracts\UserRepository::class, \App\Infrastructure\User\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Domain\Activity\Contracts\ActivityLogRepository::class, \App\Infrastructure\Activity\Repositories\ActivityLogRepositoryEloquent::class);
        $this->app->bind(\App\Domain\Activity\Contracts\MealRepository::class, \App\Infrastructure\Activity\Repositories\MealRepositoryEloquent::class);
        //:end-bindings:
    }
}
