@extends('layouts.main')

@section('title', 'Clients | VAW Tracking System')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')
    <div class="sm:flex sm:items-center sm:justify-center">
        <div class="sm:flex-auto">
            <label for="search" class="block text-sm font-medium leading-6 text-gray-900">Search client</label>
            <form action="{{ route('client.search') }}" method="post" autocomplete="off">
                @csrf
                <div class="relative mt-2 flex items-center gap-x-4">
                    <input type="text" name="search" id="search" required
                        class="block lg:w-96 w-40 rounded-md border-0 px-3 py-1.5 pr-14 text-gray-900 shadow-sm ring-1 ring-inset ring-violet-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6"
                        placeholder="Search by first name, middle name, or last name">
                    <button type="sumbmit"
                        class="inline-flex items-center gap-x-1.5 rounded-md bg-violet-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600">
                        Search
                        <svg class="-mr-0.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        <div class="flex items-center justify-center mt-4 md:mt-8 lg:mt-8">
            <button type="button" id="new-client-button"
                class="block rounded-md w-full bg-violet-600 px-3 py-1.5 text-center text-sm font-semibold
                text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2
                focus-visible:outline-offset-2 focus-visible:outline-violet-600">
                Client Intake
            </button>
        </div>
    </div>

    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                    Full name
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Barangay Code
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Contact number
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Age
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Sex
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Civil Status
                                </th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">View</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($data->clients as $client)
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                        {{ $client->full_name }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $client->barangay->brgy_code }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $client->contact_no }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $client->age }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $client->sex }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $client->civil_status }}
                                    </td>
                                    <td
                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <a href="{{ route('client.show', $client->uuid) }}"
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
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 flex justify-center gap-x-8">
        {{ $data->pagination }}
    </div>

    <div class="relative z-10 hidden" id="new-client-modal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
                    <div class="flex justify-between">
                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Client Intake</h3>
                        <button id="new-client-close-button"
                            class="rounded bg-violet-50 px-2 py-1 text-xs font-semibold text-violet-600 shadow-sm hover:bg-violet-100">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="mt-3 border-b"></div>
                    <form id="new-client-form" data-csrf="{{ csrf_token() }}" data-route="{{ route('client.check') }}"
                        method="post" autocomplete="off">
                        <div class="mt-4 space-y-2">
                            <div>
                                <label for="firstname" class="block text-sm font-medium leading-6 text-gray-900">
                                    First name
                                </label>
                                <div class="mt-1">
                                    <input type="firstname" name="firstname" id="firstname" required
                                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        placeholder="Enter first name">
                                </div>
                            </div>
                            <div>
                                <label for="middlename" class="block text-sm font-medium leading-6 text-gray-900">
                                    Middle name
                                </label>
                                <div class="mt-1">
                                    <input type="middlename" name="middlename" id="middlename" required
                                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6"
                                        placeholder="Enter middle name">
                                </div>
                            </div>
                            <div>
                                <label for="lastname" class="block text-sm font-medium leading-6 text-gray-900">
                                    Last name
                                </label>
                                <div class="mt-1">
                                    <input type="lastname" name="lastname" id="lastname" required
                                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6"
                                        placeholder="Enter last name">
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-6">
                            <button type="submit"
                                class="inline-flex w-full justify-center rounded-md bg-violet-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="relative z-10 hidden" id="complete-client-modal" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white px-6 pb-4 pt-5 text-left shadow-xl transition-all lg:w-1/2 w-full">
                    <div class="border-b border-gray-200 pb-2 lg:grid lg:grid-cols-2">
                        <div class="lg:col-span-1">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">Create New Client</h3>
                        </div>
                        <div class="flex justify-end">
                            <button type="button" id="close-complete-client-modal-button"
                                class="rounded bg-violet-50 px-2 py-1 text-xs font-semibold text-violet-600 shadow-sm hover:bg-violet-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <form action="{{ route('client.store') }}" method="post" id="complete-client-form"
                        autocomplete="off">
                        @csrf
                        <div class="mt-4 lg:grid lg:grid-cols-2 gap-x-4 gap-y-0 pb-4">
                            <div>
                                <label for="firstname" class="block text-sm font-medium leading-6 text-gray-900">
                                    First name<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <input type="text" name="firstname" id="client-firstname"
                                        class="block w-full rounded-md border-0 px-3 py-1.5
                                        text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                                        placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                        focus:ring-violet-600 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>
                            <div>
                                <label for="middlename" class="block text-sm font-medium leading-6 text-gray-900">
                                    Middle name<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <input type="text" name="middlename" id="client-middlename"
                                        class="block w-full rounded-md border-0 px-3 py-1.5
                                        text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                                        placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                        focus:ring-violet-600 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>
                            <div>
                                <label for="lastname" class="block text-sm font-medium leading-6 text-gray-900">
                                    Last name<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <input type="text" name="lastname" id="client-lastname"
                                        class="block w-full rounded-md border-0 px-3 py-1.5
                                        text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                                        placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                        focus:ring-violet-600 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>
                            <div>
                                <label for="contact_no" class="block text-sm font-medium leading-6 text-gray-900">
                                    Contact number
                                </label>
                                <div>
                                    <input type="text" name="contact_no" id="contact_no"
                                        class="block w-full rounded-md border-0 px-3 py-1.5
                                        text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                                        placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                        focus:ring-violet-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div>
                                <label for="birthdate" class="block text-sm font-medium leading-6 text-gray-900">
                                    Date of birth
                                </label>
                                <div>
                                    <input type="text" name="birthdate" id="birthdate"
                                        class="block w-full rounded-md border-0 px-3 py-1.5
                                    text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                                    placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                    focus:ring-violet-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div>
                                <label for="sex" class="block text-sm font-medium leading-6 text-gray-900">
                                    Sex<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <select id="sex" name="sex"
                                        class="mt-1 block w-full rounded-md border-0 px-2 py-1.5 pr-10
                                        text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2
                                        focus:ring-violet-600 sm:text-sm sm:leading-6"
                                        required>
                                        <option value="" selected disabled>Select option</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label for="age" class="block text-sm font-medium leading-6 text-gray-900">
                                    Age
                                </label>
                                <div>
                                    <input type="number" name="age" min="1" id="age" readonly
                                        class="block w-full rounded-md border-0 px-3 py-1.5
                                        text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                                        placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                        focus:ring-violet-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div>
                                <label for="civil_status" class="block text-sm font-medium leading-6 text-gray-900">
                                    Civil status<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <select id="civil_status" name="civil_status"
                                        class="mt-1 block w-full rounded-md border-0 px-2 py-1.5 pr-10
                                        text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2
                                        focus:ring-violet-600 sm:text-sm sm:leading-6"
                                        required>
                                        <option value="" selected disabled>Select option</option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="widowed">Widowed</option>
                                        <option value="divorced">Divorced</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label for="educ_attain" class="block text-sm font-medium leading-6 text-gray-900">
                                    Educational attainment
                                </label>
                                <div>
                                    <select id="educ_attain" name="educ_attain"
                                        class="mt-1 block w-full rounded-md border-0 px-2 py-1.5 pr-10
                                        text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2
                                        focus:ring-violet-600 sm:text-sm sm:leading-6">
                                        <option value="" selected disabled>Select option</option>
                                        <option value="No formal education">No formal education</option>
                                        <option value="Primary education">Primary education</option>
                                        <option value="Secondary education">Secondary education or high school</option>
                                        <option value="GED">General Education Development</option>
                                        <option value="Vocational qualification">Vocational qualification</option>
                                        <option value="Bachelor's degree">Bachelor's degree</option>
                                        <option value="Master's degree">Master's degree</option>
                                        <option value="Doctorate or higher">Doctorate or higher</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label for="occupation" class="block text-sm font-medium leading-6 text-gray-900">
                                    Occupation
                                </label>
                                <div>
                                    <input type="text" name="occupation" id="occupation"
                                        class="block w-full rounded-md border-0 px-3 py-1.5
                                        text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                                        placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                        focus:ring-violet-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div>
                                <label for="barangay_id" class="block text-sm font-medium leading-6 text-gray-900">
                                    Barangay<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <select id="barangay_id" name="barangay_id"
                                        class="mt-1 block w-full rounded-md border-0 px-2 py-1.5 pr-10
                                        text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2
                                        focus:ring-violet-600 sm:text-sm sm:leading-6"
                                        required>
                                        <option value="" selected disabled>Select option</option>
                                        @foreach ($data->barangays as $barangay)
                                            <option value="{{ $barangay->id }}">{{ $barangay->brgy_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="lg:col-span-2">
                                <label for="home_address" class="block text-sm font-medium leading-6 text-gray-900">
                                    Home address<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <textarea rows="2" name="home_address" id="home_address"
                                        class="block px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 resize-none"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="lg:col-span-2">
                                <label for="work_address" class="block text-sm font-medium leading-6 text-gray-900">
                                    Work address
                                </label>
                                <div>
                                    <textarea rows="2" name="work_address" id="work_address"
                                        class="block px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 resize-none"></textarea>
                                </div>
                            </div>
                            <div>
                                <label for="ethnicity" class="block text-sm font-medium leading-6 text-gray-900">
                                    Ethnicity
                                </label>
                                <div>
                                    <select id="ethnicity" name="ethnicity"
                                        class="mt-1 block w-full rounded-md border-0 px-2 py-1.5 pr-10
                                        text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2
                                        focus:ring-violet-600 sm:text-sm sm:leading-6">
                                        <option value="" selected disabled>Select option</option>
                                        <option value="non-ip">Non-IP</option>
                                        <option value="ip">IP</option>
                                        <option value="muslim">Muslim</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label for="is_4ps_beneficiary" class="block text-sm font-medium leading-6 text-gray-900">
                                    4Ps Beneficiary
                                </label>
                                <div>
                                    <select id="is_4ps_beneficiary" name="is_4ps_beneficiary"
                                        class="mt-1 block w-full rounded-md border-0 px-2 py-1.5 pr-10
                                        text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2
                                        focus:ring-violet-600 sm:text-sm sm:leading-6">
                                        <option value="" selected disabled>Select option</option>
                                        <option value="1">Member</option>
                                        <option value="0">Non-member</option>
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
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('scripts/clients.js') }}"></script>
@endsection
