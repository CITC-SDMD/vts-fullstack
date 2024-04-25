@extends('layouts.main')

@section('title', 'Update Case Profile | VAW Tracking System')

@section('content')
    <div class="flex justify-between">
        <a href="{{ route('caseprofile.show', $caseProfile->uuid) }}"
            class="inline-flex items-center gap-x-1.5 rounded-md bg-violet-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600">
            <svg class="-ml-0.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
            Back
        </a>
    </div>

    <div class="overflow-hidden bg-white shadow sm:rounded-lg mt-5">
        <div class="px-4 py-3 sm:px-6">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Update Case Information</h3>
        </div>
        <div class="border-t border-gray-100 md:px-20 lg:px-20">
            <form action="{{ route('caseProfile.update', $caseProfile->uuid) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 sm:grid-cols-2 py-4">
                    <div class="px-4 py-2 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Case Profile ID</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                            {{ $caseProfile->case_profile_id }}
                        </dd>
                    </div>
                    <div>
                        <label for="others" class="block text-sm font-medium leading-6 text-gray-900">
                            Envelope number
                        </label>
                        <div>
                            <input type="text" name="envelope_number" id="envelope_number"
                                value="{{ $caseProfile->envelope_number }}"
                                class="block w-full sm:w-1/2 rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="px-4 py-2 sm:col-span-1 sm:px-0">
                        <label for="case_category_id" class="block text-sm font-medium leading-6 text-gray-900">
                            Case category<span class="text-red-500">*</span>
                        </label>
                        <div>
                            <select id="case_category_id" name="case_category_id"
                                class="mt-2 block w-full sm:w-1/2 rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                required>
                                <option value="" selected disabled>Select option</option>
                                @foreach ($caseCategories as $caseCategory)
                                    @if ($caseProfile->case_category_id == $caseCategory->id)
                                        <option value="{{ $caseCategory->id }}" selected>
                                            {{ $caseCategory->category_name }}
                                        </option>
                                    @else
                                        <option value="{{ $caseCategory->id }}">
                                            {{ $caseCategory->category_name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                        <label for="abuse_category_id" class="block text-sm font-medium leading-6 text-gray-900">
                            Abuse Category
                        </label>
                        <div>
                            <select id="abuse_category_id" name="abuse_category_id"
                                class="mt-2 block w-full sm:w-1/2 rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="" selected disabled>Select option</option>
                                @foreach ($abuseCategories as $abuseCategory)
                                    @if ($caseProfile->abuse_category_id == $abuseCategory->id)
                                        <option value="{{ $abuseCategory->id }}" selected>
                                            {{ $abuseCategory->abuse_type }}
                                        </option>
                                    @else
                                        <option value="{{ $abuseCategory->id }}">
                                            {{ $abuseCategory->abuse_type }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                        <label for="abuse_subcategory_id" class="block text-sm font-medium leading-6 text-gray-900">
                            Abuse Subcategory
                        </label>
                        <div>
                            <select id="abuse_subcategory_id" name="abuse_subcategory_id"
                                class="mt-2 block w-full sm:w-1/2 rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="" selected disabled>Select option</option>
                                @foreach ($abuseSubcategories as $abuseSubcategory)
                                    @if ($caseProfile->abuse_subcategory_id == $abuseSubcategory->id)
                                        <option value="{{ $abuseSubcategory->id }}" selected>
                                            {{ $abuseSubcategory->type }}
                                        </option>
                                    @else
                                        <option value="{{ $abuseSubcategory->id }}">
                                            {{ $abuseSubcategory->type }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Complainant</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                            {{ $caseProfile->complainant->full_name }}
                        </dd>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Respondent</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                            {{ $caseProfile->respondent->full_name }}
                        </dd>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Relationship to respondent</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                            {{ $caseProfile->relationship->relationship_type }}
                        </dd>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Received by</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                            {{ $caseProfile->receivedBy->full_name }} -
                            {{ $caseProfile->receivedBy->agency->agency_name }}
                        </dd>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Assessed by</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                            @if ($caseProfile->assessedBy)
                                {{ $caseProfile->assessedBy->full_name }} -
                                {{ $caseProfile->assessedBy->agency->agency_name }}
                            @endif
                        </dd>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-2 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Case date start</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                            {{ \Carbon\Carbon::parse($caseProfile->created_at)->format('M d, Y') }}
                        </dd>
                    </div>
                    <div class="mt-5 sm:flex-none sm:justify-start flex justify-center">
                        <button type="submit"
                            class="inline-flex items-center gap-x-1.5 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <svg class="-ml-0.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                    clip-rule="evenodd" />
                            </svg>
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('scripts/case-update-.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#abuse_category_id').change(function() {
                var abuseCategoryId = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ url('/abuse-subcategory') }}" + '/' + abuseCategoryId,
                    success: function(response) {
                        if (response) {
                            $('#abuse_subcategory_id').empty();
                            $('#abuse_subcategory_id').append($('<option>', {
                                value: "",
                                text: 'Select option',
                                selected: true,
                                disabled: true
                            }));
                            $.each(response, function(index, value) {
                                $('#abuse_subcategory_id').append($('<option>', {
                                    value: value.id,
                                    text: value.type
                                }));
                            });
                        }
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            });
        });
    </script>
@endsection
