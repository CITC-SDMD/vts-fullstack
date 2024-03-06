@extends('layouts.main')

@section('title', 'Users | VAW Tracking System')

@section('content')
    <div class="px-4">
        <div class="shadow-sm rounded-lg bg-white px-8 py-5">
            <h3 class="text-lg font-semibold leading-6 text-gray-900">List of Agencies</h3>
            <div class="border-t border-gray-200 mt-4"></div>
            <div class="mt-4 grid grid-cols-1 lg:grid-cols-2 mb-5 py-2 gap-y-10">
                @foreach ($agencies as $agency)
                    <div>
                        <div class="flex items-center justify-start">
                            <h3 class="font-medium text-2xl text-violet-600">{{ $agency->agency_name }}</h3>
                        </div>
                        <div class="mt-4">
                            @foreach ($users as $user)
                                @if ($user->agency_id == $agency->id)
                                    <div class="flex min-w-0 gap-x-4 mt-4">
                                        <div class="min-w-0 flex-auto">
                                            <p class="text-sm font-semibold leading-none text-gray-900">
                                                Full name: {{ $user->full_name }}
                                            </p>
                                            <p class="mt-1 truncate text-xs leading-1 text-gray-500">
                                                Email address: {{ $user->email }}
                                            </p>
                                            <p class="mt-1 truncate text-xs leading-1 text-gray-500">
                                                Telephone number: {{ $user->telephone_number }}
                                            </p>
                                            <p class="mt-1 truncate text-xs leading-1 text-gray-500">
                                                Mobile number: {{ $user->mobile_number }}
                                            </p>
                                            <p class="mt-1 truncate text-xs leading-1 text-gray-500">
                                                Address: {{ $user->agency_address }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @if (isset($paginate))
            <div class="flex items-center justify-center mt-6">
                {!! $paginate !!}
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/resources.js') }}"></script>
@endsection
