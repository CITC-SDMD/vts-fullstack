@extends('layouts.main')

@section('title', 'Users | VAW Tracking System')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 lg:mx-20">
        <div class="sm:flex sm:items-center sm:justify-center">
            <div class="sm:flex-auto">
                <label for="search" class="block text-sm font-medium leading-6 text-gray-900">Search users</label>
                <form action="{{ route('users.search') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="relative mt-2 flex items-center gap-x-4">
                        <input type="text" name="search" id="search" required
                            class="block lg:w-96 w-40 rounded-md border-0 px-3 py-1.5 pr-14 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            placeholder="Search by first name, last name, or agency">
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
                <button type="button" id="new-user-button"
                    class="block rounded-md w-full bg-violet-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600">
                    Create new user
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
                                        Agency
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Full name
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Email address
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Contact number
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Created at</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($users as $user)
                                    <tr>
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                            {{ $user->agency->agency_name }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $user->full_name }}
                                        </td>
                                        <td
                                            class="truncate text-ellipsis overflow-hidden whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $user->email }}
                                        </td>
                                        <td
                                            class="truncate text-ellipsis overflow-hidden whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $user->contact_number }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($user->created_at)->format('M d, Y') }}
                                        </td>
                                        <td
                                            class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            <a href="{{ route('users.show', $user->uuid) }}"
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
    </div>

    @if (isset($paginate))
        <div class="mt-4 flex items-center justify-center">
            {!! $paginate !!}
        </div>
    @endif

    <div class="relative z-10 hidden" id="new-user-modal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden h-188 rounded-lg bg-white px-6 pb-4 pt-5 text-left shadow-xl transition-all lg:w-1/2 w-full">
                    <div class="border-b border-gray-200 pb-2 lg:grid lg:grid-cols-2">
                        <div class="lg:col-span-1">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">Create New User</h3>
                        </div>
                        <div class="flex justify-end">
                            <button type="button" id="new-user-close-button"
                                class="rounded bg-violet-50 px-2 py-1 text-xs font-semibold text-violet-600 shadow-sm hover:bg-violet-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <form action="{{ route('users.store') }}" method="post" id="new-user-form" autocomplete="off">
                        @csrf
                        <div class="mt-4 lg:grid lg:grid-cols-2 gap-x-4 gap-y-2 pb-4">
                            <div class="lg:col-span-2">
                                <label for="role" class="block text-sm font-medium leading-6 text-gray-900">
                                    Role<span class="text-red-500">*</span>
                                </label>
                                <select id="role" name="role" required
                                    class="block lg:w-1/4 w-full rounded-md border-0 py-1.5 pl-1 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @if (session('user.agency_id') == 13)
                                        <option value="" selected disabled>Select role</option>
                                        <option value="Administrator">Administrator</option>
                                        <option value="User">User</option>
                                    @else
                                        <option value="User" selected>User</option>
                                    @endif
                                </select>
                            </div>
                            <div>
                                <label for="firstname" class="block text-sm font-medium leading-6 text-gray-900">
                                    First name<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <input type="text" name="firstname" id="firstname" required
                                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        placeholder="Enter first name">
                                </div>
                            </div>
                            <div>
                                <label for="lastname" class="block text-sm font-medium leading-6 text-gray-900">
                                    Last name<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <input type="text" name="lastname" id="lastname" required
                                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        placeholder="Enter last name">
                                </div>
                            </div>
                            <div>
                                <label for="contact_number" class="block text-sm font-medium leading-6 text-gray-900">
                                    Contact number<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <input type="text" name="contact_number" id="contact_number" required
                                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        placeholder="Enter contact number">
                                </div>
                            </div>
                            <div>
                                <label for="agency_id" class="block text-sm font-medium leading-6 text-gray-900">
                                    Agency<span class="text-red-500">*</span>
                                </label>
                                <select id="agency_id" name="agency_id" required
                                    class="block w-full rounded-md border-0 py-1.5 pl-1 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option selected disabled>Select agency</option>
                                    @foreach ($agencies as $agency)
                                        <option value="{{ $agency->id }}">{{ $agency->agency_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="lg:col-span-2">
                                <label for="agency_address" class="block text-sm font-medium leading-6 text-gray-900">
                                    Agency address<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <textarea rows="2" name="agency_address" id="agency_address" required
                                        class="block resize-none w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                </div>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">
                                    Email address<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <input type="email" name="email" id="email" required
                                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        placeholder="Enter email address">
                                </div>
                            </div>
                            <div>
                                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">
                                    Password<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <input type="password" name="password" id="password" required
                                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        placeholder="Enter password">
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center">
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
    <script src="{{ asset('scripts/users.js') }}"></script>
@endsection
