@extends('layouts.main')

@section('title', 'Clients | VAW Tracking System')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center sm:justify-center">
            <div class="sm:flex-auto">
                <label for="search" class="block text-sm font-medium leading-6 text-gray-900">Search client</label>
                <form action="" method="post">
                    @csrf
                    <div class="relative mt-2 flex items-center gap-x-4">
                        <input type="text" name="search" id="search"
                            class="block lg:w-96 w-40 rounded-md border-0 px-3 py-1.5 pr-14 text-gray-900 shadow-sm ring-1 ring-inset ring-violet-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6"
                            placeholder="Search by first name, middle name, or last name">
                        <button type="sumbmit"
                            class="inline-flex items-center gap-x-1.5 rounded-md bg-violet-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600">
                            Search
                            <svg class="-mr-0.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
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
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                        Lindsay Walton</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Front-end Developer</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">lindsay.walton@example.com
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Member</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Member</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Member</td>
                                    <td
                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span
                                                class="sr-only">, Lindsay Walton</span></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
                    <div class="flex justify-between">
                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Client Intake</h3>
                        <button class="text-gray-500 hover:text-gray-700 hover:bg-violet-100 rounded-md px-2">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="mt-3 border-b"></div>
                    <form action="" method="post">
                        @csrf
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
@endsection

@section('scripts')
    <script src="{{ asset('scripts/clients.js') }}"></script>
@endsection
