@extends('layouts.main')

@section('title', 'Client Profile | VTS')

@section('content')
    <div class="flex items-center justify-between">
        <div>
            <a href="{{ route('client.index') }}"
                class="inline-flex items-center gap-x-1.5 rounded-md bg-violet-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600">
                <svg class="-ml-0.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
                Back
            </a>
        </div>
        <div>
            <a href="{{ route('client.edit', session('client.uuid')) }}"
                class="inline-flex items-center gap-x-1.5 rounded-md bg-violet-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="-ml-0.5 h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                </svg>
                Update Profile
            </a>
            @if (!session('client.file'))
                <button id="uploadButton"
                    class="inline-flex items-center gap-x-1.5 rounded-md bg-violet-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600">
                    <svg class="-ml-0.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                    </svg>
                    Upload Signature
                </button>
            @endif
        </div>
    </div>

    <div class="overflow-hidden bg-white shadow sm:rounded-lg mt-5">
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
                        {{ session('client.contact_no') ?? 'N/A' }}
                    </dd>
                </div>
                <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Date of birth</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        {{ session('client.birthdate') ?? 'N/A' }}
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
                        {{ session('client.age') ?? 'N/A' }}
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
                        {{ session('client.occupation') ?? 'N/A' }} {{ session('client.other_occupation') ?? '' }}
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
                <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Signature</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                        @if (session('client.file'))
                            <a href="{{ route('client.show.download', session('client.uuid')) }}"
                                class="inline-flex items-center gap-x-1.5 rounded-md bg-indigo-50 px-2.5 py-1.5 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-100">
                                <svg class="-ml-0.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                </svg>
                                Download Signature
                            </a>
                        @endif
                        N/A
                    </dd>
                </div>
            </dl>
        </div>
    </div>

    <div class="mt-6">
        <div class="block">
            <nav class="isolate flex divide-x rounded-lg divide-gray-200 shadow" aria-label="Tabs">
                <a href="{{ route('client.show.cases', session('client.uuid')) }}" id="casesprofile-button"
                    class="text-gray-500 hover:text-gray-900 hover:underline rounded-l-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-center text-xs lg:text-sm font-medium hover:bg-gray-50 focus:z-10">
                    <span>Case Profiles</span>
                    <span aria-hidden="true" id="caseprofiles-aria" class="absolute inset-x-0 bottom-0 h-0.5"></span>
                </a>
                <a href="{{ route('client.show.respondents', session('client.uuid')) }}" id="respondents-button"
                    class="text-gray-500 hover:text-gray-900 hover:underline group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-center text-xs lg:text-sm font-medium hover:bg-gray-50 focus:z-10">
                    <span>Respondents</span>
                    <span aria-hidden="true" id="respondents-aria" class="absolute inset-x-0 bottom-0 h-0.5"></span>
                </a>
                <a href="{{ route('client.show.dependents', session('client.uuid')) }}" id="children-button"
                    class="text-gray-500 hover:text-gray-900 hover:underline rounded-r-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-center text-xs lg:text-sm font-medium hover:bg-gray-50 focus:z-10">
                    <span>Children</span>
                    <span aria-hidden="true" id="children-aria" class="absolute inset-x-0 bottom-0 h-0.5"></span>
                </a>
            </nav>
        </div>

        <div class="px-4 sm:px-6 lg:px-8">
            @yield('client-profile')
        </div>
    </div>

    <div class="relative z-10 hidden" id="signature-modal" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white px-6 pb-4 pt-5 text-left shadow-xl transition-all">
                    <div class="border-b border-gray-200 pb-2 lg:grid lg:grid-cols-2">
                        <div class="lg:col-span-1">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">Upload Signature</h3>
                        </div>
                        <div class="flex justify-end">
                            <button type="button" id="upload-close-button"
                                class="rounded bg-violet-50 px-2 py-1 text-xs font-semibold text-violet-600 shadow-sm hover:bg-violet-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <form action="{{ route('client.upload', session('client.uuid')) }}" method="post" id="upload-form"
                        enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="mt-4 pb-4">
                            <div class="flex justify-center items-center">
                                <div>
                                    <label for="image" class="block text-sm font-medium leading-6 text-gray-900">
                                        Select image
                                    </label>
                                    <div
                                        class="border border-gray-200 w-44 h-44 rounded-md mt-2 cursor-pointer group relative">
                                        <label for="image-input"
                                            class="absolute inset-0 flex items-center justify-center w-full h-full">
                                            <svg class="mx-auto h-fit w-fit text-gray-300" id="default-image"
                                                viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <img id="image-preview" class="w-fit h-fit hidden group-hover:hidden"
                                                alt="image">
                                        </label>
                                        <input type="file" name="file" id="image-input" required
                                            class="absolute inset-0 opacity-0 cursor-pointer"
                                            accept="image/jpeg, image/png, image/gif, image/webp">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 flex justify-center">
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
    <script src="{{ asset('scripts/client-profile.js') }}"></script>
@endsection
