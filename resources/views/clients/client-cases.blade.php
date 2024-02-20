@extends('clients.client-profile')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
        integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('client-profile')
    <div class="flex mt-4 items-center justify-end">
        <button type="button" id="new-caseprofile-button"
            class="block rounded-md bg-violet-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600">
            Create New Case
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
                                    Case Profile ID
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Complainant
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Case category
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Abuse category
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Case created</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($cases as $case)
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                        {{ $case->case_profile_id }}
                                    </td>
                                    <td
                                        class="truncate text-ellipsis overflow-hidden whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $case->complainant->full_name }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        @if ($case->caseCategory->category_name == 'Others')
                                            {{ $case->caseCategory->category_name }} -
                                        @else
                                            {{ $case->caseCategory->category_name }}
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        @if ($case->abuseCategory)
                                            {{ $case->abuseCategory->abuse_type . ' - ' }} {{ $case->others ?? '' }}
                                        @else
                                            N/A
                                        @endif

                                        @if ($case->abuseSubcategory)
                                            {{ $case->abuseSubcategory->type ?? '' }}
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($case->created_at)->format('M d, Y') }}
                                    </td>
                                    <td
                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <a href="{{ route('caseprofile.show', $case->uuid) }}"
                                            class="inline-flex gap-x-1 items-center rounded bg-violet-50 px-4 py-1 text-xs font-semibold text-violet-600 shadow-sm hover:bg-violet-100">
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

    <div class="flex items-center justify-center mt-4">
        {!! $casesPagination !!}
    </div>

    <div class="relative z-10 hidden" id="new-case-modal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden h-212 rounded-lg bg-white px-6 pb-4 pt-5 text-left shadow-xl transition-all lg:w-1/2 w-full">
                    <div class="border-b border-gray-200 pb-2 lg:grid lg:grid-cols-2">
                        <div class="lg:col-span-1">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">Create New Case</h3>
                        </div>
                        <div class="flex justify-end">
                            <button type="button" id="new-case-close-button"
                                class="rounded bg-violet-50 px-2 py-1 text-xs font-semibold text-violet-600 shadow-sm hover:bg-violet-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <form action="{{ route('client.store.case') }}" method="post" id="new-case-form" autocomplete="off">
                        @csrf
                        <div class="mt-4 lg:grid lg:grid-cols-2 gap-x-4 gap-y-0 pb-4">
                            <div>
                                <label for="complainant_id" class="block text-sm font-medium leading-6 text-gray-900">
                                    Complainant<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <select id="complainant_id" name="complainant_id" required>
                                        <option value="" disabled>Select option</option>
                                        <option value="{{ $client->id }}" selected>
                                            {{ $client->full_name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label for="respondent_id" class="block text-sm font-medium leading-6 text-gray-900">
                                    Respondent<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <select id="respondent_id" name="respondent_id" required>
                                        <option value="" selected disabled>Select option</option>
                                        @foreach ($respondents as $respondent)
                                            <option value="{{ $respondent->id }}">{{ $respondent->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label for="relationship_id" class="block text-sm font-medium leading-6 text-gray-900">
                                    Relationship to respondent<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <select id="relationship_id" name="relationship_id" required>
                                        <option value="" selected disabled>Select option</option>
                                        @foreach ($relationships as $relationship)
                                            <option value="{{ $relationship->id }}">
                                                {{ $relationship->relationship_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label for="case_category_id" class="block text-sm font-medium leading-6 text-gray-900">
                                    Case category<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <select id="case_category_id" name="case_category_id" required>
                                        <option value="" selected disabled>Select option</option>
                                        @foreach ($caseCategories as $caseCategory)
                                            <option value="{{ $caseCategory->id }}">
                                                {{ $caseCategory->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="abusecat hidden">
                                <label for="abuse_category_id" class="text-sm font-medium leading-6 text-gray-900">
                                    Abuse Category
                                </label>
                                <div>
                                    <select id="abuse_category_id" name="abuse_category_id[]">
                                        <option value="" selected disabled>Select option</option>
                                        @foreach ($abuseCategories as $abuseCategory)
                                            <option value="{{ $abuseCategory->id }}">
                                                {{ $abuseCategory->abuse_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="abusesubcat hidden">
                                <label for="abuse_subcategory_id" class="text-sm font-medium leading-6 text-gray-900">
                                    Abuse Subcategory
                                </label>
                                <div>
                                    <select id="abuse_subcategory_id" name="abuse_subcategory_id[]">
                                        <option value="" selected disabled>Select option</option>
                                    </select>
                                </div>
                            </div>
                            <div class="othercases hidden">
                                <label for="others" class="block text-sm font-medium leading-6 text-gray-900">
                                    Please specify:
                                </label>
                                <div>
                                    <input type="text" name="others" id="others"
                                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 sm:text-sm sm:leading-6">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('scripts/client-cases.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#abuse_category_id').change(function() {
                var abuse_category_ids = $('#abuse_category_id').val();
                if (abuse_category_ids) {
                    $.ajax({
                        type: "POST",
                        url: "/clients/get-subcategories",
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'abuse_category_ids': abuse_category_ids,
                        },
                        success: function(response) {
                            console.log(response);
                            var selectize = $('#abuse_subcategory_id')[0].selectize;
                            selectize.clearOptions();
                            response.forEach(function(subcategory) {
                                selectize.addOption({
                                    value: subcategory.id,
                                    text: subcategory.type
                                });
                            });
                            selectize.refreshItems();
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    });
                }

                if ($('#abuse_category_id').val() == 5) {
                    $('.othercases').removeClass('hidden');
                    $('#others').attr('required', true);
                    $(".abusesubcat").addClass('hidden');
                } else {
                    $('.othercases').addClass('hidden');
                    $('#others').removeAttr('required');
                    $(".abusesubcat").removeClass('hidden');
                }
            });
        });
    </script>
@endsection
