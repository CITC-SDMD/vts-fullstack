<?php

namespace App\Repositories;

use App\Interface\Repositories\ReportRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportRepository implements ReportRepositoryInterface
{
    public function clientSummaryFirstQuarter()
    {
        $startOfMonth = Carbon::parse('first day of January')->startOfDay();
        $endOfMonth = Carbon::parse('last day of March')->endOfDay();

        return DB::table('clients')
            ->select(
                DB::raw('"1st Quarter" as quarter'),
                DB::raw('SUM(CASE WHEN clients.age > 17 AND clients.sex = "female" THEN 1 ELSE 0 END) as women'),
                DB::raw('SUM(CASE WHEN clients.age < 18 THEN 1 ELSE 0 END) as children')
            )
            ->whereBetween('clients.created_at', [$startOfMonth, $endOfMonth])
            ->get();
    }

    public function clientSummarySecondQuarter()
    {
        $startOfFirstQuarter = Carbon::parse('first day of January')->startOfDay();
        $endOfFirstQuarter = Carbon::parse('last day of March')->endOfDay();
        $startOfSecondQuarter = Carbon::parse('first day of April')->startOfDay();
        $endOfSecondQuarter = Carbon::parse('last day of June')->endOfDay();

        $firstQuarterResults = DB::table('clients')
            ->select(
                DB::raw('"1st Quarter" as quarter'),
                DB::raw('SUM(CASE WHEN clients.age > 17 AND clients.sex = "female" THEN 1 ELSE 0 END) as women'),
                DB::raw('SUM(CASE WHEN clients.age < 18 THEN 1 ELSE 0 END) as children')
            )
            ->whereBetween('clients.created_at', [$startOfFirstQuarter, $endOfFirstQuarter])
            ->first();

        $secondQuarterResults = DB::table('clients')
            ->select(
                DB::raw('"2nd Quarter" as quarter'),
                DB::raw('SUM(CASE WHEN clients.age > 17 AND clients.sex = "female" THEN 1 ELSE 0 END) as women'),
                DB::raw('SUM(CASE WHEN clients.age < 18 THEN 1 ELSE 0 END) as children')
            )
            ->whereBetween('clients.created_at', [$startOfSecondQuarter, $endOfSecondQuarter])
            ->first();

        $results = collect([$firstQuarterResults, $secondQuarterResults]);

        return $results;
    }

    public function clientSummaryThirdQuarter()
    {
        $startOfFirstQuarter = Carbon::parse('first day of January')->startOfDay();
        $endOfFirstQuarter = Carbon::parse('last day of March')->endOfDay();
        $startOfSecondQuarter = Carbon::parse('first day of April')->startOfDay();
        $endOfSecondQuarter = Carbon::parse('last day of June')->endOfDay();
        $startOfThirdQuarter = Carbon::parse('first day of July')->startOfDay();
        $endOfThirdQuarter = Carbon::parse('last day of September')->endOfDay();

        $firstQuarterResults = DB::table('clients')
            ->select(
                DB::raw('"1st Quarter" as quarter'),
                DB::raw('SUM(CASE WHEN clients.age > 17 AND clients.sex = "female" THEN 1 ELSE 0 END) as women'),
                DB::raw('SUM(CASE WHEN clients.age < 18 THEN 1 ELSE 0 END) as children')
            )
            ->whereBetween('clients.created_at', [$startOfFirstQuarter, $endOfFirstQuarter])
            ->first();

        $secondQuarterResults = DB::table('clients')
            ->select(
                DB::raw('"2nd Quarter" as quarter'),
                DB::raw('SUM(CASE WHEN clients.age > 17 AND clients.sex = "female" THEN 1 ELSE 0 END) as women'),
                DB::raw('SUM(CASE WHEN clients.age < 18 THEN 1 ELSE 0 END) as children')
            )
            ->whereBetween('clients.created_at', [$startOfSecondQuarter, $endOfSecondQuarter])
            ->first();

        $thirdQuarterResults = DB::table('clients')
            ->select(
                DB::raw('"3rd Quarter" as quarter'),
                DB::raw('SUM(CASE WHEN clients.age > 17 AND clients.sex = "female" THEN 1 ELSE 0 END) as women'),
                DB::raw('SUM(CASE WHEN clients.age < 18 THEN 1 ELSE 0 END) as children')
            )
            ->whereBetween('clients.created_at', [$startOfThirdQuarter, $endOfThirdQuarter])
            ->first();

        $results = collect([$firstQuarterResults, $secondQuarterResults, $thirdQuarterResults]);

        return $results;
    }

    public function clientSummaryFourthQuarter()
    {
        $startOfFirstQuarter = Carbon::parse('first day of January')->startOfDay();
        $endOfFirstQuarter = Carbon::parse('last day of March')->endOfDay();
        $startOfSecondQuarter = Carbon::parse('first day of April')->startOfDay();
        $endOfSecondQuarter = Carbon::parse('last day of June')->endOfDay();
        $startOfThirdQuarter = Carbon::parse('first day of July')->startOfDay();
        $endOfThirdQuarter = Carbon::parse('last day of September')->endOfDay();
        $startOfFourthQuarter = Carbon::parse('first day of October')->startOfDay();
        $endOfFourthQuarter = Carbon::parse('last day of December')->endOfDay();

        $firstQuarterResults = DB::table('clients')
            ->select(
                DB::raw('"1st Quarter" as quarter'),
                DB::raw('SUM(CASE WHEN clients.age > 17 AND clients.sex = "female" THEN 1 ELSE 0 END) as women'),
                DB::raw('SUM(CASE WHEN clients.age < 18 THEN 1 ELSE 0 END) as children')
            )
            ->whereBetween('clients.created_at', [$startOfFirstQuarter, $endOfFirstQuarter])
            ->first();

        $secondQuarterResults = DB::table('clients')
            ->select(
                DB::raw('"2nd Quarter" as quarter'),
                DB::raw('SUM(CASE WHEN clients.age > 17 AND clients.sex = "female" THEN 1 ELSE 0 END) as women'),
                DB::raw('SUM(CASE WHEN clients.age < 18 THEN 1 ELSE 0 END) as children')
            )
            ->whereBetween('clients.created_at', [$startOfSecondQuarter, $endOfSecondQuarter])
            ->first();

        $thirdQuarterResults = DB::table('clients')
            ->select(
                DB::raw('"3rd Quarter" as quarter'),
                DB::raw('SUM(CASE WHEN clients.age > 17 AND clients.sex = "female" THEN 1 ELSE 0 END) as women'),
                DB::raw('SUM(CASE WHEN clients.age < 18 THEN 1 ELSE 0 END) as children')
            )
            ->whereBetween('clients.created_at', [$startOfThirdQuarter, $endOfThirdQuarter])
            ->first();

        $fourthQuarterResults = DB::table('clients')
            ->select(
                DB::raw('"4th Quarter" as quarter'),
                DB::raw('SUM(CASE WHEN clients.age > 17 AND clients.sex = "female" THEN 1 ELSE 0 END) as women'),
                DB::raw('SUM(CASE WHEN clients.age < 18 THEN 1 ELSE 0 END) as children')
            )
            ->whereBetween('clients.created_at', [$startOfFourthQuarter, $endOfFourthQuarter])
            ->first();

        $results = collect([
            $firstQuarterResults,
            $secondQuarterResults,
            $thirdQuarterResults,
            $fourthQuarterResults,
        ]);

        return $results;
    }
}
