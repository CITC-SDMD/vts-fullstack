<?php

namespace App\Http\Controllers;

use App\Interface\Repositories\CaseLogRepositoryInterface;
use App\Interface\Repositories\CaseProfileRepositoryInterface;
use App\Interface\Repositories\ClientRepositoryInterface;

class DashboardController extends Controller
{
    private $clientRepository;

    private $caseProfileRepository;

    private $caseLogRepository;

    public function __construct(
        ClientRepositoryInterface $clientRepository,
        CaseProfileRepositoryInterface $caseProfileRepository,
        CaseLogRepositoryInterface $caseLogRepository
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

        $stats = [
            'clients' => $clients,
            'cases' => $cases,
            'caseLogs' => $caseLogs,
            'clientsPerMonth' => $clientsPerMonth,
            'casesPerMonth' => $casesPerMonth,
            'caseLogsPerMonth' => $caseLogsPerMonth,
        ];

        return view('pages.dashboard', [
            'stats' => $stats,
        ]);
    }
}
