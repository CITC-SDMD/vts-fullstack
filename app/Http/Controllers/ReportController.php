<?php

namespace App\Http\Controllers;

use App\Interface\Repositories\ReportRepositoryInterface;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    private $reportRepository;

    public function __construct(ReportRepositoryInterface $reportRepository)
    {
        $this->middleware('auth');
        $this->reportRepository = $reportRepository;
    }

    public function index()
    {
        return view('pages.reports');
    }

    public function firstQuarterClientSummary()
    {
        $summaries = $this->reportRepository->clientSummaryFirstQuarter();

        $pdf = Pdf::loadView('pdf.client-summary', [
            'summaries' => $summaries,
            'duration' => 'January to March 2023',
        ]);

        return $pdf->stream('first-quarter-client-summary-report.pdf');
    }

    public function secondQuarterClientSummary()
    {
        $summaries = $this->reportRepository->clientSummarySecondQuarter();

        $pdf = Pdf::loadView('pdf.client-summary', [
            'summaries' => $summaries,
            'duration' => 'January to June 2023',
        ]);

        return $pdf->stream('second-quarter-client-summary-report.pdf');
    }

    public function thirdQuarterClientSummary()
    {
        $summaries = $this->reportRepository->clientSummaryThirdQuarter();

        $pdf = Pdf::loadView('pdf.client-summary', [
            'summaries' => $summaries,
            'duration' => 'January to September 2023',
        ]);

        return $pdf->stream('third-quarter-client-summary-report.pdf');
    }

    public function fourthQuarterClientSummary()
    {
        $summaries = $this->reportRepository->clientSummaryFourthQuarter();

        $pdf = Pdf::loadView('pdf.client-summary', [
            'summaries' => $summaries,
            'duration' => 'January to December 2023',
        ]);

        return $pdf->stream('fourth-quarter-client-summary-report.pdf');
    }
}
