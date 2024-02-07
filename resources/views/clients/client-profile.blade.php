@extends('layouts.main')

@section('title', 'Client Profile | VTS')

@section('content')
    <div class="sm:mx-20">
        <a href="{{ route('client.index') }}"
            class="inline-flex items-center gap-x-1.5 rounded-md bg-violet-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600">
            <svg class="-ml-0.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
            Back
        </a>
    </div>

    <div class="overflow-hidden bg-white shadow sm:rounded-lg sm:mx-20 mt-5">
        <div class="px-4 py-2 sm:px-6">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Client Information</h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal details of the client.</p>
        </div>
        <div class="border-t border-gray-100 md:px-20 sm:px-20 py-2">
            <dl class="grid grid-cols-1 sm:grid-cols-2">
                <div class="px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Full name</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        {{ session('client.full_name') }}
                    </dd>
                </div>
                <div class="px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Contact number</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        {{ session('contact_no') ?? 'N/A' }}
                    </dd>
                </div>
                <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Date of birth</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        {{ \Carbon\Carbon::parse(session('client.birthdate'))->format('M d, Y') }}
                    </dd>
                </div>
                <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Sex</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        {{ session('client.sex') }}
                    </dd>
                </div>
                <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Age</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        {{ session('client.age') }}
                    </dd>
                </div>
                <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Civil status</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        {{ session('client.civil_status') }}
                    </dd>
                </div>
                <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Educational Attainment</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        {{ session('client.educ_attain') ?? 'N/A' }}
                    </dd>
                </div>
                <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Occupation</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        {{ session('client.occupation') ?? 'N/A' }}
                    </dd>
                </div>
                <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Barangay code</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        {{ session('client.barangay.brgy_code') }}
                    </dd>
                </div>
                <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Home address</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        {{ session('client.home_address') }}
                    </dd>
                </div>
                <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Work address</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        {{ session('client.work_address') ?? 'N/A' }}
                    </dd>
                </div>
                <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Ethnicity</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        {{ session('client.ethnicity') ?? 'N/A' }}
                    </dd>
                </div>
                <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">4Ps Member</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        @if (session('client.is_4ps_beneficiary') == null)
                            N/A
                        @elseif(session('client.is_4ps_beneficiary') == 1)
                            4Ps Member
                        @else
                            Not a 4Ps Member
                        @endif
                    </dd>
                </div>
                <div class="border-t border-gray-100 "></div>
            </dl>
        </div>
    </div>

    <div class="mt-6 sm:px-20">
        <div class="block">
            <nav class="isolate flex divide-x rounded-lg divide-gray-200 shadow" aria-label="Tabs">
                <a href="{{ route('client.show.cases', session('client.uuid')) }}" id="casesprofile-button"
                    class="text-gray-500 rounded-l-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-center text-xs lg:text-sm font-medium hover:bg-gray-50 focus:z-10">
                    <span>Case Profiles</span>
                    <span aria-hidden="true" id="caseprofiles-aria" class="absolute inset-x-0 bottom-0 h-0.5"></span>
                </a>
                <a href="{{ route('client.show.respondents', session('client.uuid')) }}" id="respondents-button"
                    class="text-gray-500 hover:text-gray-700 group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-center text-xs lg:text-sm font-medium hover:bg-gray-50 focus:z-10">
                    <span>Respondents</span>
                    <span aria-hidden="true" id="respondents-aria" class="absolute inset-x-0 bottom-0 h-0.5"></span>
                </a>
                <a href="{{ route('client.show.dependents', session('client.uuid')) }}" id="children-button"
                    class="text-gray-500 hover:text-gray-700 rounded-r-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-center text-xs lg:text-sm font-medium hover:bg-gray-50 focus:z-10"
                    aria-current="page">
                    <span>Children</span>
                    <span aria-hidden="true" id="children-aria" class="absolute inset-x-0 bottom-0 h-0.5"></span>
                </a>
            </nav>
        </div>

        <div class="px-4 sm:px-6 lg:px-8">
            @yield('client-profile')
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/client-profile.js') }}"></script>
@endsection
