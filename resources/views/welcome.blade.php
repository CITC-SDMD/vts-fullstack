<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/logo.ico') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <title>VAW Tracking System</title>
</head>

<body class="h-full">
    <div class="flex min-h-full">
        <div class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="flex flex-col min-h-full">
                <div class="mx-auto w-full max-w-sm lg:w-96 flex-grow">
                    <div>
                        <div class="flex justify-center">
                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <img class="w-28" src="{{ asset('images/IGDD-logo.png') }}" alt="Your Company">
                            </a>
                        </div>
                        <div class="flex justify-center">
                            <h2 class="mt-6 text-2xl font-bold leading-9 tracking-tight text-gray-900">
                                VAW Tracking System
                            </h2>
                        </div>
                    </div>

                    <div class="mt-10">
                        <div>
                            <form action="{{ route('auth.login') }}" method="POST" class="space-y-6"
                                autocomplete="off">
                                @csrf
                                <div>
                                    <label for="email"
                                        class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                                    <div class="mt-2">
                                        <input id="email" name="email" type="email" required autocomplete="off"
                                            class="block w-full rounded-md border-0 px-3 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6"
                                            placeholder="Enter email address">
                                    </div>
                                </div>

                                <div>
                                    <label for="email"
                                        class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                                    <div class="mt-2 flex rounded-md shadow-sm">
                                        <div class="relative flex flex-grow items-stretch focus-within:z-10">
                                            <input type="password" name="password" id="password"
                                                class="block w-full rounded-none rounded-l-md border-0 px-3 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                placeholder="Password">
                                        </div>
                                        <button type="button" id="showPassword"
                                            class="relative -ml-px inline-flex items-center gap-x-1.5 rounded-r-md px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="-ml-0.5 h-5 w-5 text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </button>
                                        <button type="button" id="hidePassword"
                                            class="relative -ml-px hidden items-center gap-x-1.5 rounded-r-md px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="-ml-0.5 h-5 w-5 text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div>
                                    <button type="submit"
                                        class="flex w-full justify-center rounded-md bg-violet-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600">
                                        Sign in
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <footer class="bg-white">
                    <div class="grid grid-cols-1">
                        <div class="flex justify-center">
                            <a href="https://www.davaocity.gov.ph/" class="text-gray-400 hover:text-gray-500">
                                <img class="w-36" src="{{ asset('images/logo.png') }}" alt="Your Company">
                            </a>
                        </div>
                        <div class="flex justify-center mt-2">
                            <p class="text-center text-xs leading-5 text-gray-500">
                                &copy; 2024 City Government of Davao City.<br>All rights reserved.
                            </p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <div class="relative hidden w-0 flex-1 lg:block">
            <div class="absolute inset-0 h-full w-full object-cover">
                <img class="h-full w-full object-cover" src="{{ asset('images/handsupport.jpg') }}" alt="">
                <div class="absolute inset-0 bg-violet-900 opacity-60"></div>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')

    <script src="{{ asset('scripts/jquery.min.js') }}"></script>
    <script src="{{ asset('scripts/welcome.js') }}"></script>
</body>

</html>
