<?php

namespace App\Http\Controllers;

use App\Interface\Repositories\AbuseSubcategoryRepositoryInterface;
use App\Interface\Repositories\CaseProfileRepositoryInterface;
use App\Interface\Repositories\ReferralAgencyRepositoryInterface;
use App\Interface\Repositories\ServiceRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CaseProfileController extends Controller
{
    private $caseProfileRepository;

    private $referralAgencyRepository;

    private $serviceRepository;

    public function __construct(
        CaseProfileRepositoryInterface $caseProfileRepository,
        ReferralAgencyRepositoryInterface $referralAgencyRepository,
        ServiceRepositoryInterface $serviceRepository,
    ) {
        $this->middleware('auth');
        $this->caseProfileRepository = $caseProfileRepository;
        $this->referralAgencyRepository = $referralAgencyRepository;
        $this->serviceRepository = $serviceRepository;
    }

    public function index()
    {
        $cases = $this->caseProfileRepository->index();

        return view('pages.cases', [
            'cases' => $cases,
            'casesPagination' => $cases->links('components.pagination'),
        ]);
    }

    public function show($uuid)
    {
        $caseProfile = $this->caseProfileRepository->showByUuid($uuid);
        $agencies = $this->referralAgencyRepository->index();
        $services = $this->serviceRepository->index();

        Session::put('caseProfile', $caseProfile);

        return view('cases.case-profile', [
            'agencies' => $agencies,
            'services' => $services,
        ]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
