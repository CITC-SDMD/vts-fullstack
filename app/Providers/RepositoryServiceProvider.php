<?php

namespace App\Providers;

use App\Interface\Repositories\AbuseCategoryRepositoryInterface;
use App\Interface\Repositories\BarangayRepositoryInterface;
use App\Interface\Repositories\CaseCategoryRepositoryInterface;
use App\Interface\Repositories\CaseProfileRepositoryInterface;
use App\Interface\Repositories\ChildRepositoryInterface;
use App\Interface\Repositories\ClientRepositoryInterface;
use App\Interface\Repositories\RelationshipRepositoryInterface;
use App\Interface\Repositories\RespondentRepositoryInterface;
use App\Interface\Repositories\UserRepositoryInterface;
use App\Repositories\AbuseCategoryRepository;
use App\Repositories\BarangayRepository;
use App\Repositories\CaseCategoryRepository;
use App\Repositories\CaseProfileRepository;
use App\Repositories\ChildRepository;
use App\Repositories\ClientRepository;
use App\Repositories\RelationshipRepository;
use App\Repositories\RespondentRepository;
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
        $this->app->bind(CaseProfileRepositoryInterface::class, CaseProfileRepository::class);
        $this->app->bind(RespondentRepositoryInterface::class, RespondentRepository::class);
        $this->app->bind(ChildRepositoryInterface::class, ChildRepository::class);
        $this->app->bind(RelationshipRepositoryInterface::class, RelationshipRepository::class);
        $this->app->bind(CaseCategoryRepositoryInterface::class, CaseCategoryRepository::class);
        $this->app->bind(AbuseCategoryRepositoryInterface::class, AbuseCategoryRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
