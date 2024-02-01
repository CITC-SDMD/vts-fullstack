<?php

namespace App\Providers;

use App\Interface\Repositories\BarangayRepositoryInterface;
use App\Interface\Repositories\ClientRepositoryInterface;
use App\Interface\Repositories\UserRepositoryInterface;
use App\Repositories\BarangayRepository;
use App\Repositories\ClientRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //Repositories
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
        $this->app->bind(BarangayRepositoryInterface::class, BarangayRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
