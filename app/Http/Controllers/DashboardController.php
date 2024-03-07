<?php

namespace App\Http\Controllers;

use App\Interface\Repositories\CaseLogRepositoryInterface;
use App\Interface\Repositories\CaseProfileRepositoryInterface;
use App\Interface\Repositories\ClientRepositoryInterface;
use App\Interface\Repositories\RespondentRepositoryInterface;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    private $clientRepository;

    private $caseProfileRepository;

    private $caseLogRepository;

    public function __construct(
        ClientRepositoryInterface $clientRepository,
        CaseProfileRepositoryInterface $caseProfileRepository,
        CaseLogRepositoryInterface $caseLogRepository,
    ) {
        $this->middleware('auth');
        $this->clientRepository = $clientRepository;
        $this->caseProfileRepository = $caseProfileRepository;
        $this->caseLogRepository = $caseLogRepository;
    }

    public function index()
    {
        $clients = $this->clientRepository->clientCount();
        $cases = $this->caseProfileRepository->caseCount();
        $caseLogs = $this->caseLogRepository->caseLogCount();
        $clientsPerMonth = $this->clientRepository->clientPerMonth();
        $casesPerMonth = $this->caseProfileRepository->casePerMonth();
        $caseLogsPerMonth = $this->caseLogRepository->caseLogPerMonth();
        $womentFirstQuarter = $this->caseProfileRepository->womenFirstQuarter();
        $womenSecondQuarter = $this->caseProfileRepository->womenSecondQuarter();
        $womenThirdQuarter = $this->caseProfileRepository->womenThirdQuarter();
        $womenFourthQuarter = $this->caseProfileRepository->womenFourthQuarter();

        $stats = [
            'clients' => $clients,
            'cases' => $cases,
            'caseLogs' => $caseLogs,
            'clientsPerMonth' => $clientsPerMonth,
            'casesPerMonth' => $casesPerMonth,
            'caseLogsPerMonth' => $caseLogsPerMonth,
            'womentFirstQuarter' => $womentFirstQuarter,
            'womenSecondQuarter' => $womenSecondQuarter,
            'womenThirdQuarter' => $womenThirdQuarter,
            'womenFourthQuarter' => $womenFourthQuarter,
        ];

        return view('pages.dashboard', [
            'stats' => $stats,
        ]);
    }
}
