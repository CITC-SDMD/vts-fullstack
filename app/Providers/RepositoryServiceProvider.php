<?php

namespace App\Providers;

use App\Interface\Repositories\UserRepositoryInterface;
use App\Interface\Services\UserServiceInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserService;
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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
