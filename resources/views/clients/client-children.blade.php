@extends('clients.client-profile')

@section('client-profile')
    <div class="flex mt-4 items-center justify-end">
        <button type="button" id="create-dependent-button"
            class="block rounded-md bg-violet-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600">
            Create Dependent
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
                                    Name
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Age
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Civil Status
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Education Level
                                </th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">View</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($data->children as $child)
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                        {{ $child->full_name }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $child->age }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $child->civil_status }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $child->educ_level }}
                                    </td>
                                    <td
                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <a href="#" class="text-violet-600 hover:text-violet-900"></a>
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
        {{ $data->childrenPagination }}
    </div>

    <div class="relative z-10 hidden" id="new-dependent-modal" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white px-6 pb-4 pt-5 text-left shadow-xl transition-all lg:w-1/2 w-full">
                    <div class="border-b border-gray-200 pb-2 lg:grid lg:grid-cols-2">
                        <div class="lg:col-span-1">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">Create New Child</h3>
                        </div>
                        <div class="flex justify-end">
                            <button type="button" id="close-new-dependent-modal-button"
                                class="rounded bg-violet-50 px-2 py-1 text-xs font-semibold text-violet-600 shadow-sm hover:bg-violet-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <form action="{{ route('child.store') }}" method="post" id="new-dependent-form" autocomplete="off">
                        @csrf
                        <input type="hidden" name="client_id" value="{{ session('client.id') }}">
                        <div class="mt-4 lg:grid lg:grid-cols-2 gap-x-4 gap-y-0 pb-4">
                            <div>
                                <label for="firstname" class="block text-sm font-medium leading-6 text-gray-900">
                                    First name<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <input type="text" name="firstname" id="child_firstname"
                                        class="block w-full rounded-md border-0 px-3 py-1.5
                                        text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                                        placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                        focus:ring-violet-600 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>
                            <div>
                                <label for="middlename" class="block text-sm font-medium leading-6 text-gray-900">
                                    Middle name<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <input type="text" name="middlename" id="child_middlename"
                                        class="block w-full rounded-md border-0 px-3 py-1.5
                                        text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                                        placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                        focus:ring-violet-600 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>
                            <div>
                                <label for="lastname" class="block text-sm font-medium leading-6 text-gray-900">
                                    Last name<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <input type="text" name="lastname" id="child_lastname"
                                        class="block w-full rounded-md border-0 px-3 py-1.5
                                        text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                                        placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                        focus:ring-violet-600 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>
                            <div>
                                <label for="age" class="block text-sm font-medium leading-6 text-gray-900">
                                    Age<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <input type="number" name="age" id="child_age"
                                        class="block w-full rounded-md border-0 px-3 py-1.5
                                        text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                                        placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                        focus:ring-violet-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div>
                                <label for="civil_status" class="block text-sm font-medium leading-6 text-gray-900">
                                    Civil status<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <select id="child_civil_status" name="civil_status"
                                        class="mt-1 block w-full rounded-md border-0 px-2 py-1.5 pr-10
                                        text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2
                                        focus:ring-violet-600 sm:text-sm sm:leading-6"
                                        required>
                                        <option value="" selected disabled>Select option</option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="widowed">Widowed</option>
                                        <option value="divorced">Divorced</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label for="educ_level" class="block text-sm font-medium leading-6 text-gray-900">
                                    Educational attainment<span class="text-red-500">*</span>
                                </label>
                                <div>
                                    <select id="educ_level" name="educ_level"
                                        class="mt-1 block w-full rounded-md border-0 px-2 py-1.5 pr-10
                                        text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2
                                        focus:ring-violet-600 sm:text-sm sm:leading-6">
                                        <option value="" selected disabled>Select option</option>
                                        <option value="No formal education">No formal education</option>
                                        <option value="Primary education">Primary education</option>
                                        <option value="Secondary education">Secondary education or high school</option>
                                        <option value="GED">General Education Development</option>
                                        <option value="Vocational qualification">Vocational qualification</option>
                                        <option value="Bachelor's degree">Bachelor's degree</option>
                                        <option value="Master's degree">Master's degree</option>
                                        <option value="Doctorate or higher">Doctorate or higher</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-center">
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
    <script src="{{ asset('scripts/client-children.js') }}"></script>
@endsection
