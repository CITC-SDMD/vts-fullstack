@extends('layouts.main')

@section('title', 'Case Profile | VAW Tracking System')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
        integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="sm:mx-20">
        <a href="{{ route('caseprofile.index') }}"
            class="inline-flex items-center gap-x-1.5 rounded-md bg-violet-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600">
            <svg class="-ml-0.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
            Back
        </a>
    </div>

    <div class="overflow-hidden bg-white shadow sm:rounded-lg lg:mx-20 mt-5">
        <div class="px-4 py-3 sm:px-6">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Case Information</h3>
        </div>
        <div class="border-t border-gray-100 md:px-20 lg:px-20 py-1">
            <dl class="grid grid-cols-1 sm:grid-cols-2">
                <div class="px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Case Profile ID</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        {{ session('caseProfile.case_profile_id') }}
                    </dd>
                </div>
                <div class="px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Case code</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        {{ session('caseProfile.case_code') }}
                    </dd>
                </div>
                <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Case category</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        {{ session('caseProfile.caseCategory.category_name') }}
                    </dd>
                </div>
                <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Abuse category</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        @if (session('caseProfile.abuseCategory'))
                            {{ session('caseProfile.abuseCategory.abuse_type') }} -
                            {{ session('caseProfile.abuseSubcategory.type') }}
                        @else
                            N/A
                        @endif
                    </dd>
                </div>
                <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Complainant</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        {{ session('caseProfile.complainant.full_name') }}
                    </dd>
                </div>
                <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Respondent</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        {{ session('caseProfile.respondent.full_name') }}
                    </dd>
                </div>
                <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Relationship to respondent</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        {{ session('caseProfile.relationship.relationship_type') }}
                    </dd>
                </div>
                <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Recieved by</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        {{ session('caseProfile.receivedBy.full_name') }}
                    </dd>
                </div>
                <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Assessed by</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        @if (session('caseProfile.assessedBy'))
                            {{ session('caseProfile.assessedBy.full_name') }}
                        @endif
                    </dd>
                </div>
                <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Case date start</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        {{ \Carbon\Carbon::parse(session('case.date_start'))->format('M d, Y') }}
                    </dd>
                </div>
            </dl>
        </div>
    </div>

    <div class="mt-4 lg:mx-20 px-4 lg:px-0">
        <div class="grid grid-cols-2 sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Case logs</h1>
            </div>
            <div class="sm:ml-16 sm:mt-0 flex justify-end">
                <button type="button" id="new-caselog-button"
                    class="block rounded-md bg-violet-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600">
                    Create Case Log
                </button>
            </div>
        </div>
        <div class="mt-2 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        Case Log Number
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Referred By
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Referral Agency
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Assistance Required
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Status
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Date created
                                    </th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">View</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                {{-- @foreach ($caseLogs['data'] as $caseLog) --}}
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                        {{-- {{ $caseLog['case_log_number'] }} --}}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{-- {{ $caseLog['referred_by']['agency']['agency_name'] }} --}}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{-- {{ $caseLog['referral_agency']['agency_name'] }} --}}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{-- {{ $caseLog['service']['service_type'] }} --}}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{-- @foreach ($caseLog['assistance_logs'] as $logs) --}}
                                        {{-- {{ $logs['status'] }} --}}
                                        {{-- @endforeach --}}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{-- {{ \Carbon\Carbon::parse($caseLog['created_at'])->format('M d, Y') }} --}}
                                    </td>
                                    <td
                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        {{-- @if (session('user.user.agency_id') == $caseLog['referral_agency']['id'] || session('user.user.agency_id') == $caseLog['referred_by']['agency']['id']) --}}
                                        <a href="#"
                                            class="inline-flex gap-x-1 items-center rounded bg-indigo-50 px-4 py-1 text-xs font-semibold text-violet-600 shadow-sm hover:bg-violet-100">
                                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                            View
                                        </a>
                                        {{-- @endif --}}
                                    </td>
                                </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative z-10" id="new-caselog-modal" aria-labelledby="modal-title" role="dialog"
            aria-modal="true">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white px-6 pb-4 h-96 pt-5 text-left shadow-xl transition-all lg:w-1/2 w-full">
                        <div class="border-b border-gray-200 pb-2 lg:grid lg:grid-cols-2">
                            <div class="lg:col-span-1">
                                <h3 class="text-base font-semibold leading-6 text-gray-900">Create New Case Log</h3>
                            </div>
                            <div class="flex justify-end">
                                <button type="button" id="close-new-caselog-button"
                                    class="rounded bg-violet-50 px-2 py-1 text-xs font-semibold text-violet-600 shadow-sm hover:bg-violet-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <form action="#" method="post" id="new-caselog-form" autocomplete="off">
                            @csrf
                            <input type="hidden" id="case_profile_id" name="case_profile_id"
                                value="{{ session('caseProfile.id') }}">
                            <div class="mt-4 lg:grid lg:grid-cols-2 gap-x-4 gap-y-0 pb-4">
                                <div>
                                    <label for="referral_agency_id"
                                        class="block text-sm font-medium leading-6 text-gray-900">
                                        Referral Agency<span class="text-red-500">*</span>
                                    </label>
                                    <div>
                                        <select id="referral_agency_id" name="referral_agency_id[]" required>
                                            <option value="" selected disabled>Select option</option>
                                            @foreach ($agencies as $agency)
                                                <option value="{{ $agency->id }}">{{ $agency->agency_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label for="service_id" class="block text-sm font-medium leading-6 text-gray-900">
                                        Assistance Required<span class="text-red-500">*</span>
                                    </label>
                                    <div>
                                        <select id="service_id" name="service_id[]" required>
                                            <option value="" selected disabled>Select option</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->service_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 flex justify-center">
                                <button type="submit"
                                    class="rounded-md bg-violet-600 px-6 py-2 text-sm font-semibold
                                    text-white shadow-sm hover:bg-violet-500 focus-visible:outline
                                    focus-visible:outline-2 focus-visible:outline-offset-2
                                    focus-visible:outline-violet-600">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
            integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('scripts/case-profile.js') }}"></script>
    @endsection
