@extends('layouts.main')

@section('title', 'Case Log | VAW Tracking System')

@section('content')
    <div class="min-h-full">
        <main class="py-2">
            <div
                class="mx-auto mt-2 grid max-w-3xl grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
                <div class="space-y-6 lg:col-span-3 lg:col-start-1">
                    <div>
                        <a href="{{ route('caseprofile.show', $caselog->caseProfile->uuid) }}"
                            class="inline-flex items-center gap-x-1.5 rounded-md bg-violet-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600">
                            <svg class="-ml-0.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                            Back
                        </a>
                    </div>

                    <section aria-labelledby="applicant-information-title">
                        <div class="bg-white shadow sm:rounded-lg">
                            <div class="px-4 py-5 sm:px-6">
                                <h2 id="applicant-information-title" class="text-lg font-medium leading-6 text-gray-900">
                                    Case Assessment</h2>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">Details and history about the case</p>
                            </div>
                            <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Case number</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            {{ $caselog->caseProfile->case_profile_id }}
                                        </dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Case code</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            {{ $caselog->caseProfile->case_code }}
                                        </dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Case category</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            {{ $caselog->caseProfile->caseCategory->category_name }}
                                        </dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Referred By</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            {{ $caselog->referredBy->agency->agency_name }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Referred Agency</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            {{ $caselog->referralAgency->agency_name }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Service Required</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $caselog->service->service_type }}
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </section>

                    <section aria-labelledby="notes-title">
                        <div class="bg-white shadow sm:overflow-hidden sm:rounded-lg">
                            <div class="divide-y divide-gray-200">
                                <div class="px-4 py-5 sm:px-6">
                                    <h2 id="notes-title" class="text-lg font-medium text-gray-900">Assistance History</h2>
                                </div>
                                <div class="px-4 py-6 sm:px-6 overflow-hidden overflow-y-auto h-72">
                                    @if (count($caselog->assistanceLogs) != 0)
                                        <ul role="list" class="space-y-4">
                                            @foreach ($caselog->assistanceLogs as $assistance)
                                                <li>
                                                    <div class="flex space-x-3">
                                                        <div class="flex-shrink-0">
                                                            <div id="user-avatar"
                                                                class="h-8 w-8 rounded-full bg-violet-800 flex items-center justify-center">
                                                                <span class="text-white">
                                                                    {{ substr($assistance->user->firstname, 0, 1) . substr($assistance->user->lastname, 0, 1) }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="w-full">
                                                            <div class="grid grid-cols-2">
                                                                <div>
                                                                    <a href="#"
                                                                        class="font-medium gap-x-2 text-sm text-gray-900 pointer-events-none leading-none">
                                                                        {{ $assistance->user->full_name }}
                                                                        <span class="text-xxs text-gray-500 font-normal">
                                                                            {{ $assistance->user->agency->agency_name }}
                                                                        </span>
                                                                        <p class="text-xxs text-gray-500">
                                                                            Status: {{ $assistance->status }}
                                                                        </p>
                                                                    </a>
                                                                </div>
                                                                <div class="mt-1 text-xxs flex justify-end">
                                                                    <span class="font-medium text-gray-500">
                                                                        {{ \Carbon\Carbon::parse($assistance->created_at)->format('M d, Y - g:i A') }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3 mb-2 font-medium text-gray-700">
                                                                {{ $assistance->description }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <div class="text-center mt-12">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                            </svg>

                                            <h3 class="mt-2 text-sm font-semibold text-gray-900">No data yet.</h3>
                                            <p class="mt-1 text-sm text-gray-500">Get started by writing something on how
                                                you assisted the client.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-6 sm:px-6">
                                <div class="flex space-x-3">
                                    <div class="flex-shrink-0">
                                        <div id="user-avatar"
                                            class="h-8 w-8 rounded-full bg-violet-800 flex items-center justify-center">
                                            <span
                                                class="text-white">{{ substr(session('user.firstname'), 0, 1) . substr(session('user.lastname'), 0, 1) }}</span>
                                        </div>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <form action="{{ route('assistancelogs.store') }}" method="post"
                                            autocomplete="off">
                                            @csrf
                                            <div>
                                                <input type="hidden" name="case_log_id" value="{{ $caselog->id }}">
                                                <label for="description" class="sr-only">About</label>
                                                <textarea id="description" name="description" rows="3" required
                                                    class="block w-full resize-none rounded-md border-0 px-3 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
                                                    placeholder="Add assistance description"></textarea>
                                            </div>
                                            <div class="grid grid-cols-2">
                                                <div class="mt-3 flex items-center justify-start">
                                                    <div>
                                                        <select id="status" name="status" required
                                                            class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                            <option value="" selected disabled>Select status</option>
                                                            <option value="Complaint Prepared">
                                                                Complaint Prepared
                                                            </option>
                                                            <option
                                                                value="Complaint Filed at City Prosecutor’s Office - Info Filed">
                                                                Complaint Filed at City Prosecutor’s Office - Info Filed
                                                            </option>
                                                            <option
                                                                value="Complaint Filed at City Prosecutor’s Office - Dismissed">
                                                                Complaint Filed at City Prosecutor’s Office - Dismissed
                                                            </option>
                                                            <option value="Case Filed at Court - Ongoing">
                                                                Case Filed at Court - Ongoing
                                                            </option>
                                                            <option value="Case Filed at Court - Archived">
                                                                Case Filed at Court - Archived
                                                            </option>
                                                            <option value="Case Filed at Court - Dismissed">
                                                                Case Filed at Court - Dismissed
                                                            </option>
                                                            <option value="Terminated">
                                                                Terminated
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mt-3 flex items-center justify-end">
                                                    <button type="submit"
                                                        class="inline-flex items-center justify-center rounded-md bg-violet-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/case-log.js') }}"></script>
@endsection
