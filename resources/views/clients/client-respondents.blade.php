@extends('clients.client-profile')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('client-profile')
    <div class="flex mt-4 items-center justify-end">
        <button type="button" id="new-respondent-button"
            class="block rounded-md bg-violet-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600">
            Create Respondent
        </button>
    </div>
    <div class="mt-4 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                    Name
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
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($data->respondents as $respondent)
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                        {{ $respondent->full_name }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $respondent->contact_no }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $respondent->age }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $respondent->sex }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $respondent->civil_status }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="flex items-center justify-center mt-4">
        {{ $data->respondentsPagination }}
    </div>

    <div class="relative z-10 hidden" id="new-client-modal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
                    <div class="flex justify-between">
                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Client Intake</h3>
                        <button id="new-respondent-close-button"
                            class="rounded bg-violet-50 px-2 py-1 text-xs font-semibold text-violet-600 shadow-sm hover:bg-violet-100">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="mt-3 border-b"></div>
                    <form id="new-respondent-form" data-csrf="{{ csrf_token() }}" data-route="{{ route('client.check') }}"
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

    <div class="relative z-10 hidden" id="complete-respondent-modal" aria-labelledby="modal-title" role="dialog"
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
                            <button type="button" id="close-complete-respondent-modal-button"
                                class="rounded bg-violet-50 px-2 py-1 text-xs font-semibold text-violet-600 shadow-sm hover:bg-violet-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <form action="{{ route('client.store.respondent') }}" method="post" id="complete-respondent-form"
                        autocomplete="off">
                        @csrf
                        <div class="mt-4 lg:grid lg:grid-cols-2 gap-x-4 gap-y-0 pb-4">
                            <div>
                                <label for="firstname" class="block text-sm font-medium leading-6 text-gray-900">
                                    First name<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <input type="hidden" name="complainant_id" id="complainant_id"
                                        value="{{ session('client.id') }}">
                                    <input type="text" name="firstname" id="respondent-firstname"
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
                                    <input type="text" name="middlename" id="respondent-middlename"
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
                                    <input type="text" name="lastname" id="respondent-lastname"
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
                                    Date of birth<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <input type="text" name="birthdate" id="birthdate"
                                        class="block w-full rounded-md border-0 px-3 py-1.5
                                text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                                placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                focus:ring-violet-600 sm:text-sm sm:leading-6"
                                        required>
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
                                    Age<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <input type="number" name="age" min="1" id="age"
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
                                <label for="civil_status" class="block text-sm font-medium leading-6 text-gray-900">
                                    Ethnicity
                                </label>
                                <div>
                                    <select id="civil_status" name="civil_status"
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

    <div class="relative z-10 hidden error-modal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                                Respondent already exists.
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    This respondent already exists in the database, you can not create a new record for
                                    this.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                        <button type="button" id="error-confirm-button"
                            class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('scripts/client-respondents.js') }}"></script>
@endsection
