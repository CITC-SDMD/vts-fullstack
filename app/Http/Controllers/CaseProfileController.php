<?php

namespace App\Http\Controllers;

use App\Interface\Repositories\AbuseCategoryRepositoryInterface;
use App\Interface\Repositories\AbuseSubcategoryRepositoryInterface;
use App\Interface\Repositories\CaseCategoryRepositoryInterface;
use App\Interface\Repositories\CaseLogRepositoryInterface;
use App\Interface\Repositories\CaseProfileRepositoryInterface;
use App\Interface\Repositories\ClientRepositoryInterface;
use App\Interface\Repositories\ReferralAgencyRepositoryInterface;
use App\Interface\Repositories\RelationshipRepositoryInterface;
use App\Interface\Repositories\ServiceRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CaseProfileController extends Controller
{
    private $caseProfileRepository;

    private $referralAgencyRepository;

    private $serviceRepository;

    private $caseLogRepository;

    private $clientRepository;

    private $relationshipRepository;

    private $caseCategoryRepository;

    private $abuseCategoryRepository;

    private $abuseSubcategoryRepository;

    public function __construct(
        CaseProfileRepositoryInterface $caseProfileRepository,
        ReferralAgencyRepositoryInterface $referralAgencyRepository,
        ServiceRepositoryInterface $serviceRepository,
        CaseLogRepositoryInterface  $caseLogRepository,
        ClientRepositoryInterface $clientRepository,
        RelationshipRepositoryInterface $relationshipRepository,
        CaseCategoryRepositoryInterface $caseCategoryRepository,
        AbuseCategoryRepositoryInterface $abuseCategoryRepository,
        AbuseSubcategoryRepositoryInterface $abuseSubcategoryRepository
    ) {
        $this->middleware('auth');
        $this->caseProfileRepository = $caseProfileRepository;
        $this->referralAgencyRepository = $referralAgencyRepository;
        $this->serviceRepository = $serviceRepository;
        $this->caseLogRepository = $caseLogRepository;
        $this->clientRepository = $clientRepository;
        $this->relationshipRepository = $relationshipRepository;
        $this->caseCategoryRepository = $caseCategoryRepository;
        $this->abuseCategoryRepository = $abuseCategoryRepository;
        $this->abuseSubcategoryRepository = $abuseSubcategoryRepository;
    }

    public function index()
    {
        $cases = $this->caseProfileRepository->index();
        $clients = $this->clientRepository->showAllClient();
        $relationships = $this->relationshipRepository->index();
        $caseCategories = $this->caseCategoryRepository->index();
        $abuseCategories = $this->abuseCategoryRepository->index();
        $abuseSubcategories = $this->abuseSubcategoryRepository->index();

        return view('pages.cases', [
            'cases' => $cases,
            'clients' => $clients,
            'relationships' => $relationships,
            'caseCategories' => $caseCategories,
            'abuseCategories' => $abuseCategories,
            'abuseSubcategories' => $abuseSubcategories,
            'casesPagination' => $cases->links('components.pagination'),
        ]);
    }

    public function show($uuid)
    {
        $caseProfile = $this->caseProfileRepository->showByUuid($uuid);
        $caseLogs = $this->caseLogRepository->showByCaseProfileId($caseProfile->id);
        $agencies = $this->referralAgencyRepository->index();
        $services = $this->serviceRepository->index();

        Session::put('caseProfile', $caseProfile);

        return view('cases.case-profile', [
            'agencies' => $agencies,
            'services' => $services,
            'caselogs' => $caseLogs,
            'paginate' => $caseLogs->links('components.pagination')
        ]);
    }

    public function search(Request $request)
    {
        $cases = $this->caseProfileRepository->search($request);

        return view('pages.cases', [
            'cases' => $cases
        ]);
    }
}
