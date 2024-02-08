<?php

namespace App\Providers;

use App\Interface\Repositories\AbuseCategoryRepositoryInterface;
use App\Interface\Repositories\AbuseSubcategoryRepositoryInterface;
use App\Interface\Repositories\BarangayRepositoryInterface;
use App\Interface\Repositories\CaseCategoryRepositoryInterface;
use App\Interface\Repositories\CaseLogRepositoryInterface;
use App\Interface\Repositories\CaseProfileRepositoryInterface;
use App\Interface\Repositories\ChildRepositoryInterface;
use App\Interface\Repositories\ClientRepositoryInterface;
use App\Interface\Repositories\ReferralAgencyRepositoryInterface;
use App\Interface\Repositories\RelationshipRepositoryInterface;
use App\Interface\Repositories\RespondentRepositoryInterface;
use App\Interface\Repositories\ServiceRepositoryInterface;
use App\Interface\Repositories\UserRepositoryInterface;
use App\Repositories\AbuseCategoryRepository;
use App\Repositories\AbuseSubcategoryRepository;
use App\Repositories\BarangayRepository;
use App\Repositories\CaseCategoryRepository;
use App\Repositories\CaseLogRepository;
use App\Repositories\CaseProfileRepository;
use App\Repositories\ChildRepository;
use App\Repositories\ClientRepository;
use App\Repositories\ReferralAgencyRepository;
use App\Repositories\RelationshipRepository;
use App\Repositories\RespondentRepository;
use App\Repositories\ServiceRepository;
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
        $this->app->bind(AbuseSubcategoryRepositoryInterface::class, AbuseSubcategoryRepository::class);
        $this->app->bind(ReferralAgencyRepositoryInterface::class, ReferralAgencyRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        $this->app->bind(CaseLogRepositoryInterface::class, CaseLogRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
