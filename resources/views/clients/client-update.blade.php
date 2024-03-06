@extends('layouts.main')

@section('title', 'Client Profile | VTS')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')
    <div class="flex items-center justify-between">
        <div class="sm:mx-20">
            <a href="{{ route('client.show', $client->uuid) }}"
                class="inline-flex items-center gap-x-1.5 rounded-md bg-violet-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600">
                <svg class="-ml-0.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
                Back
            </a>
        </div>
    </div>

    <div class="overflow-hidden bg-white shadow sm:rounded-lg sm:mx-20 mt-5">
        <div class="px-4 py-2 sm:px-6">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Client Information</h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal details of the client.</p>
        </div>
        <div class="border-t border-gray-100 md:px-20 sm:px-20 py-2">
            <form action="{{ route('client.update', $client->uuid) }}" autocomplete="off" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-y-1 mb-3 px-4">
                    <div>
                        <label for="firstname" class="block text-sm font-medium leading-6 text-gray-900">
                            First name
                        </label>
                        <div>
                            <input type="text" name="firstname" id="firstname" required
                                class="block w-full lg:w-1/2 px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6"
                                value={{ $client->firstname }}>
                        </div>
                    </div>
                    <div>
                        <label for="middlename" class="block text-sm font-medium leading-6 text-gray-900">
                            Middle name
                        </label>
                        <div>
                            <input type="text" name="middlename" id="middlename" required
                                class="block w-full lg:w-1/2 px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6"
                                value={{ $client->middlename }}>
                        </div>
                    </div>
                    <div>
                        <label for="lastname" class="block text-sm font-medium leading-6 text-gray-900">
                            Last name
                        </label>
                        <div>
                            <input type="text" name="lastname" id="lastname" required
                                class="block w-full lg:w-1/2 px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6"
                                value={{ $client->lastname }}>
                        </div>
                    </div>
                    <div>
                        <label for="contact_no" class="block text-sm font-medium leading-6 text-gray-900">
                            Contact number
                        </label>
                        <div>
                            <input type="text" name="contact_no" id="contact_no"
                                class="block w-full lg:w-1/2 px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6"
                                value={{ $client->contact_no }}>
                        </div>
                    </div>
                    <div>
                        <label for="birthdate" class="block text-sm font-medium leading-6 text-gray-900">
                            Date of birth
                        </label>
                        <div>
                            <input type="text" name="birthdate" required id="birthdate" value="{{ $client->birthdate }}"
                                class="block w-full lg:w-1/2 rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="sex" class="block text-sm font-medium leading-6 text-gray-900">
                            Sex
                        </label>
                        <select id="sex" name="sex" required
                            class="block w-full lg:w-1/2 rounded-md border-0 py-1.5 pl-2 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-violet-600 sm:text-sm sm:leading-6">
                            @if ($client->sex == 'male')
                                <option value="male" selected>Male</option>
                                <option value="female">Female</option>
                            @else
                                <option value="male">Male</option>
                                <option value="female" selected>Female</option>
                            @endif
                        </select>
                    </div>
                    <div>
                        <label for="age" class="block text-sm font-medium leading-6 text-gray-900">
                            Age
                        </label>
                        <div>
                            <input type="text" name="age" id="age" value="{{ $client->age }}" readonly
                                class="block w-full lg:w-1/2 rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="civil_status" class="block text-sm font-medium leading-6 text-gray-900">
                            Civil status
                        </label>
                        <select id="civil_status" name="civil_status" required
                            class="block w-full lg:w-1/2 rounded-md border-0 py-1.5 pl-2 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-violet-600 sm:text-sm sm:leading-6">
                            @if ($client->civil_status == 'single')
                                <option value="single" selected>single</option>
                                <option value="married">married</option>
                                <option value="widowed">widowed</option>
                                <option value="divorced">divorced</option>
                            @elseif($client->civil_status == 'married')
                                <option value="single">single</option>
                                <option value="married" selected>married</option>
                                <option value="widowed">widowed</option>
                                <option value="divorced">divorced</option>
                            @elseif($client->civil_status == 'widowed')
                                <option value="single">single</option>
                                <option value="married">married</option>
                                <option value="widowed" selected>widowed</option>
                                <option value="divorced">divorced</option>
                            @else
                                <option value="single">single</option>
                                <option value="married">married</option>
                                <option value="widowed">widowed</option>
                                <option value="divorced" selected>divorced</option>
                            @endif
                        </select>
                    </div>
                    <div>
                        <label for="educ_attain" class="block text-sm font-medium leading-6 text-gray-900">
                            Educational Attainment
                        </label>
                        <select id="educ_attain" name="educ_attain"
                            class="block w-full lg:w-1/2 rounded-md border-0 py-1.5 pl-2 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-violet-600 sm:text-sm sm:leading-6">
                            @if ($client->educ_attain == 'No formal education')
                                <option value="No formal education" selected>No formal education</option>
                                <option value="Primary education">Primary education</option>
                                <option value="Secondary education">Secondary education or high school</option>
                                <option value="GED">General Education Development</option>
                                <option value="Vocational qualification">Vocational qualification</option>
                                <option value="Bachelor's degree">Bachelor's degree</option>
                                <option value="Master's degree">Master's degree</option>
                                <option value="Doctorate or higher">Doctorate or higher</option>
                            @elseif($client->educ_attain == 'Primary education')
                                <option value="No formal education">No formal education</option>
                                <option value="Primary education" selected>Primary education</option>
                                <option value="Secondary education">Secondary education or high school</option>
                                <option value="GED">General Education Development</option>
                                <option value="Vocational qualification">Vocational qualification</option>
                                <option value="Bachelor's degree">Bachelor's degree</option>
                                <option value="Master's degree">Master's degree</option>
                                <option value="Doctorate or higher">Doctorate or higher</option>
                            @elseif($client->educ_attain == 'Secondary education')
                                <option value="No formal education">No formal education</option>
                                <option value="Primary education">Primary education</option>
                                <option value="Secondary education" selected>Secondary education or high school</option>
                                <option value="GED">General Education Development</option>
                                <option value="Vocational qualification">Vocational qualification</option>
                                <option value="Bachelor's degree">Bachelor's degree</option>
                                <option value="Master's degree">Master's degree</option>
                                <option value="Doctorate or higher">Doctorate or higher</option>
                            @elseif($client->educ_attain == 'GED')
                                <option value="No formal education">No formal education</option>
                                <option value="Primary education">Primary education</option>
                                <option value="Secondary education">Secondary education or high school</option>
                                <option value="GED" selected>General Education Development</option>
                                <option value="Vocational qualification">Vocational qualification</option>
                                <option value="Bachelor's degree">Bachelor's degree</option>
                                <option value="Master's degree">Master's degree</option>
                                <option value="Doctorate or higher">Doctorate or higher</option>
                            @elseif($client->educ_attain == 'Vocational qualification')
                                <option value="No formal education">No formal education</option>
                                <option value="Primary education">Primary education</option>
                                <option value="Secondary education">Secondary education or high school</option>
                                <option value="GED">General Education Development</option>
                                <option value="Vocational qualification" selected>Vocational qualification</option>
                                <option value="Bachelor's degree">Bachelor's degree</option>
                                <option value="Master's degree">Master's degree</option>
                                <option value="Doctorate or higher">Doctorate or higher</option>
                            @elseif($client->educ_attain == "Bachelor's degree")
                                <option value="No formal education">No formal education</option>
                                <option value="Primary education">Primary education</option>
                                <option value="Secondary education">Secondary education or high school</option>
                                <option value="GED">General Education Development</option>
                                <option value="Vocational qualification">Vocational qualification</option>
                                <option value="Bachelor's degree" selected>Bachelor's degree</option>
                                <option value="Master's degree">Master's degree</option>
                                <option value="Doctorate or higher">Doctorate or higher</option>
                            @elseif($client->educ_attain == "Master's degree")
                                <option value="No formal education">No formal education</option>
                                <option value="Primary education">Primary education</option>
                                <option value="Secondary education">Secondary education or high school</option>
                                <option value="GED">General Education Development</option>
                                <option value="Vocational qualification">Vocational qualification</option>
                                <option value="Bachelor's degree">Bachelor's degree</option>
                                <option value="Master's degree" selected>Master's degree</option>
                                <option value="Doctorate or higher">Doctorate or higher</option>
                            @elseif($client->educ_attain == 'Doctorate or higher')
                                <option value="No formal education">No formal education</option>
                                <option value="Primary education">Primary education</option>
                                <option value="Secondary education">Secondary education or high school</option>
                                <option value="GED">General Education Development</option>
                                <option value="Vocational qualification">Vocational qualification</option>
                                <option value="Bachelor's degree">Bachelor's degree</option>
                                <option value="Master's degree">Master's degree</option>
                                <option value="Doctorate or higher" selected>Doctorate or higher</option>
                            @else
                                <option value="" selected disabled>Select option</option>
                                <option value="No formal education">No formal education</option>
                                <option value="Primary education">Primary education</option>
                                <option value="Secondary education">Secondary education or high school</option>
                                <option value="GED">General Education Development</option>
                                <option value="Vocational qualification">Vocational qualification</option>
                                <option value="Bachelor's degree">Bachelor's degree</option>
                                <option value="Master's degree">Master's degree</option>
                                <option value="Doctorate or higher">Doctorate or higher</option>
                            @endif
                        </select>
                    </div>
                    <div>
                        <label for="occupation" class="block text-sm font-medium leading-6 text-gray-900">
                            Occupation
                        </label>
                        <div>
                            <input type="text" name="occupation" id="occupation"
                                class="block w-full lg:w-1/2 px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6"
                                value={{ $client->occupation }}>
                        </div>
                    </div>
                    <div>
                        <label for="barangay_id" class="block text-sm font-medium leading-6 text-gray-900">
                            Barangay
                        </label>
                        <select id="barangay_id" name="barangay_id" required
                            class="block w-full lg:w-1/2 rounded-md border-0 py-1.5 pl-2 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-violet-600 sm:text-sm sm:leading-6">
                            @foreach ($barangays as $barangay)
                                @if ($client->barangay_id == $barangay->id)
                                    <option value="{{ $barangay->id }}" selected>{{ $barangay->brgy_name }}</option>
                                @else
                                    <option value="{{ $barangay->id }}">{{ $barangay->brgy_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="lg:col-span-2">
                        <label for="home_address" class="block text-sm font-medium leading-6 text-gray-900">
                            Home address
                        </label>
                        <div>
                            <textarea rows="2" name="home_address" id="home_address" required
                                class="resize-none block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6">{{ $client->home_address }}</textarea>
                        </div>
                    </div>
                    <div class="lg:col-span-2">
                        <label for="work_address" class="block text-sm font-medium leading-6 text-gray-900">
                            Work address
                        </label>
                        <div>
                            <textarea rows="2" name="work_address" id="work_address"
                                class="resize-none block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6">{{ $client->work_address }}</textarea>
                        </div>
                    </div>
                    <div>
                        <label for="ethnicity" class="block text-sm font-medium leading-6 text-gray-900">
                            Ethnicity
                        </label>
                        <select id="ethnicity" name="ethnicity"
                            class="block w-full lg:w-1/2 rounded-md border-0 py-1.5 pl-2 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-violet-600 sm:text-sm sm:leading-6">
                            @if ($client->ethnicity == 'non-ip')
                                <option value="non-ip" selected>non-ip</option>
                                <option value="ip">ip</option>
                                <option value="muslim">muslim</option>
                            @elseif($client->ethnicity == 'ip')
                                <option value="non-ip">non-ip</option>
                                <option value="ip" selected>ip</option>
                                <option value="muslim">muslim</option>
                            @elseif($client->ethnicity == 'muslim')
                                <option value="non-ip">non-ip</option>
                                <option value="ip">ip</option>
                                <option value="muslim" selected>muslim</option>
                            @else
                                <option value="" selected disabled>Select option</option>
                                <option value="non-ip">non-ip</option>
                                <option value="ip">ip</option>
                                <option value="muslim">muslim</option>
                            @endif
                        </select>
                    </div>
                    <div>
                        <label for="is_4ps_beneficiary" class="block text-sm font-medium leading-6 text-gray-900">
                            4Ps Member
                        </label>
                        <select id="is_4ps_beneficiary" name="is_4ps_beneficiary"
                            class="block w-full lg:w-1/2 rounded-md border-0 py-1.5 pl-2 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-violet-600 sm:text-sm sm:leading-6">
                            @if ($client->ethnicity == true)
                                <option value="1" selected>4Ps Member</option>
                                <option value="0">Not 4Ps Member</option>
                            @else
                                <option value="1">4Ps Member</option>
                                <option value="0" selected>Not 4Ps Member</option>
                            @endif
                        </select>
                    </div>
                    <div class="mt-4 lg:flex-none flex lg:justify-start justify-center items-start">
                        <button type="submit"
                            class="rounded-md bg-violet-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('scripts/client-update.js') }}"></script>
@endsection
