<?php

namespace App\Providers;

use App\Interface\Repositories\AbuseCategoryRepositoryInterface;
use App\Interface\Repositories\AbuseSubcategoryRepositoryInterface;
use App\Interface\Repositories\AssistanceLogAttachmentRepositoryInterface;
use App\Interface\Repositories\AssistanceLogRepositoryInterface;
use App\Interface\Repositories\BarangayRepositoryInterface;
use App\Interface\Repositories\CaseCategoryRepositoryInterface;
use App\Interface\Repositories\CaseLogRepositoryInterface;
use App\Interface\Repositories\CaseProfileRepositoryInterface;
use App\Interface\Repositories\ChildRepositoryInterface;
use App\Interface\Repositories\ClientRepositoryInterface;
use App\Interface\Repositories\ImportRepositoryInterface;
use App\Interface\Repositories\OccupationRepositoryInterface;
use App\Interface\Repositories\ReferralAgencyRepositoryInterface;
use App\Interface\Repositories\RelationshipRepositoryInterface;
use App\Interface\Repositories\ReportRepositoryInterface;
use App\Interface\Repositories\RespondentRepositoryInterface;
use App\Interface\Repositories\ServiceRepositoryInterface;
use App\Interface\Repositories\SuboccupationRepositoryInterface;
use App\Interface\Repositories\UserRepositoryInterface;
use App\Repositories\AbuseCategoryRepository;
use App\Repositories\AbuseSubcategoryRepository;
use App\Repositories\AssistanceLogAttachmentRepository;
use App\Repositories\AssistanceLogRepository;
use App\Repositories\BarangayRepository;
use App\Repositories\CaseCategoryRepository;
use App\Repositories\CaseLogRepository;
use App\Repositories\CaseProfileRepository;
use App\Repositories\ChildRepository;
use App\Repositories\ClientRepository;
use App\Repositories\ImportRepository;
use App\Repositories\OccupationRepository;
use App\Repositories\ReferralAgencyRepository;
use App\Repositories\RelationshipRepository;
use App\Repositories\ReportRepository;
use App\Repositories\RespondentRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\SuboccupationRepository;
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
        $this->app->bind(AssistanceLogRepositoryInterface::class, AssistanceLogRepository::class);
        $this->app->bind(AssistanceLogAttachmentRepositoryInterface::class, AssistanceLogAttachmentRepository::class);
        $this->app->bind(ReportRepositoryInterface::class, ReportRepository::class);
        $this->app->bind(OccupationRepositoryInterface::class, OccupationRepository::class);
        $this->app->bind(SuboccupationRepositoryInterface::class, SuboccupationRepository::class);
        $this->app->bind(ImportRepositoryInterface::class, ImportRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
