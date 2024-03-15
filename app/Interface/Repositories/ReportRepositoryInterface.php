<?php

namespace App\Interface\Repositories;

interface ReportRepositoryInterface
{
    public function clientSummaryFirstQuarter();

    public function clientSummarySecondQuarter();

    public function clientSummaryThirdQuarter();

    public function clientSummaryFourthQuarter();
}
