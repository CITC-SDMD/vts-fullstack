@extends('layouts.main')

@section('title', 'Dashboard | VAW Tracking System')

@section('content')
    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
        <div class="relative overflow-hidden rounded-lg bg-white shadow ">
            <dt class="px-4 pb-12 pt-5 sm:px-6 sm:pt-6">
                <div class="absolute rounded-md bg-violet-500 p-3">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                </div>
                <p class="ml-16 truncate text-sm font-medium text-gray-500">Total clients this year</p>
                <p class="ml-16 text-2xl font-semibold text-gray-900">{{ $stats['clients'] }}</p>
            </dt>
            <div class="mb-0" id="client-chart">
            </div>
        </div>
        <div class="relative overflow-hidden rounded-lg bg-white shadow">
            <dt class="px-4 pb-12 pt-5 sm:px-6 sm:pt-6">
                <div class="absolute rounded-md bg-violet-500 p-3">
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                    </svg>
                </div>
                <p class="ml-16 truncate text-sm font-medium text-gray-500">Total cases this year</p>
                <p class="ml-16 text-2xl font-semibold text-gray-900">{{ $stats['cases'] }}</p>
            </dt>
            <div class="mb-0" id="case-chart">
            </div>
        </div>
        <div class="relative overflow-hidden rounded-lg bg-white shadow">
            <dt class="px-4 pb-12 pt-5 sm:px-6 sm:pt-6">
                <div class="absolute rounded-md bg-violet-500 p-3">
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                </div>
                <p class="ml-16 truncate text-sm font-medium text-gray-500">Total case logs this year</p>
                <p class="ml-16 text-2xl font-semibold text-gray-900">{{ $stats['caseLogs'] }}</p>
            </dt>
            <div class="mb-0" id="caselogs-chart">
            </div>
        </div>
    </dl>

    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div class="relative overflow-hidden rounded-lg bg-white shadow ">
            <div class="mb-0 px-4 py-2" id="women-chart">
                hello world
            </div>
        </div>
        <div class="relative overflow-hidden rounded-lg bg-white shadow ">
            <div class="mb-0 px-4 py-2" id="children-chart">
                hello world
            </div>
        </div>
    </dl>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var clientsPerMonth = @json($stats['clientsPerMonth']);
        var casesPerMonth = @json($stats['casesPerMonth']);
        var caseLogsPerMonth = @json($stats['caseLogsPerMonth']);
    </script>
    <script src="{{ asset('scripts/dashboard.js') }}"></script>
@endsection
