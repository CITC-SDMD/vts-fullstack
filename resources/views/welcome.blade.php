<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>VAW Tracking System</title>
</head>

<body class="h-full">
    <div class="flex min-h-full">
        <div class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
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
                        <form action="{{ route('auth.login') }}" method="POST" class="space-y-6" autocomplete="off">
                            @csrf
                            <div>
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                                    address</label>
                                <div class="mt-2">
                                    <input id="email" name="email" type="email" required
                                        class="block w-full rounded-md border-0 px-3 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6"
                                        placeholder="Enter email address">
                                </div>
                            </div>

                            <div>
                                <label for="password"
                                    class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                                <div class="mt-2">
                                    <input id="password" name="password" type="password"
                                        autocomplete="current-password" required
                                        class="block w-full rounded-md border-0 px-3 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6"
                                        placeholder="Enter password">
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

                <footer class="bg-white lg:mt-48 mt-28">
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
</body>

</html>
