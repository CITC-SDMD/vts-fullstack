@extends('layouts.main')

@section('title', 'User Profile | VAW Tracking System')

@section('content')
    <div class="sm:mx-20">
        <a href="{{ route('users.index') }}"
            class="inline-flex items-center gap-x-1.5 rounded-md bg-violet-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600">
            <svg class="-ml-0.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
            Back
        </a>
    </div>

    <div class="shadow-sm bg-white px-8 py-5 sm:mx-20 mt-6 rounded-lg">
        <h3 class="text-lg font-semibold leading-6 text-gray-900">User Profile</h3>
        <div class="border-t border-gray-200 mt-4"></div>
        <form action="{{ route('users.update', $user->uuid) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mt-4 grid grid-cols-1 lg:grid-cols-2 gap-y-4">
                <div>
                    <label for="firstname" class="block text-sm font-medium leading-6 text-gray-900">
                        First name
                    </label>
                    <div>
                        <input type="text" name="firstname" id="firstname" required
                            class="block w-full lg:w-1/2 rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6"
                            value="{{ $user->firstname }}">
                    </div>
                </div>
                <div>
                    <label for="lastname" class="block text-sm font-medium leading-6 text-gray-900">
                        Last name
                    </label>
                    <div>
                        <input type="text" name="lastname" id="lastname" required
                            class="block w-full lg:w-1/2 rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6"
                            value="{{ $user->lastname }}">
                    </div>
                </div>
                <div>
                    <label for="telephone_number" class="block text-sm font-medium leading-6 text-gray-900">
                        Telephone number
                    </label>
                    <div>
                        <input type="text" name="telephone_number" id="telephone_number" required
                            class="block w-full lg:w-1/2 rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6"
                            value="{{ $user->telephone_number }}">
                    </div>
                </div>
                <div>
                    <label for="mobile_number" class="block text-sm font-medium leading-6 text-gray-900">
                        Mobile number
                    </label>
                    <div>
                        <input type="text" name="mobile_number" id="mobile_number" required
                            class="block w-full lg:w-1/2 rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6"
                            value="{{ $user->mobile_number }}">
                    </div>
                </div>
                <div>
                    <label for="agency_address" class="block text-sm font-medium leading-6 text-gray-900">
                        Agency address
                    </label>
                    <div>
                        <input type="text" name="agency_address" id="agency_address" required
                            class="block w-full lg:w-1/2 rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6"
                            value="{{ $user->agency_address }}">
                    </div>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">
                        Email address
                    </label>
                    <div>
                        <input type="email" name="email" id="email" required
                            class="block w-full lg:w-1/2 rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6"
                            value="{{ $user->email }}">
                    </div>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">
                        Password
                    </label>
                    <div>
                        <input type="password" name="password" id="password"
                            class="block w-full lg:w-1/2 rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6"
                            placeholder="Enter new password">
                    </div>
                </div>
                <div class="flex items-center justify-start lg:col-span-2 mt-4 lg:mt-10">
                    <button type="submit"
                        class="inline-flex items-center gap-x-2 rounded-md bg-violet-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600">
                        Update
                        <svg class="-ml-0.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/user-profile.js') }}"></script>
@endsection
