<?php

namespace App\Providers;

use App\Repositories\Eloquent\KnightRepository;
use App\Repositories\Interfaces\KnightRepositoryInterface;
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
        $this->app->bind(KnightRepositoryInterface::class, KnightRepository::class);
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
