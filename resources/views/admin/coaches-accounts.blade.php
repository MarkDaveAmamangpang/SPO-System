@extends('layouts.layout')
@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
            Coaches List
        </h1>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <form id="archive-form" method="POST" action="{{ route('admin.archive-selected') }}">
            @csrf
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative pb-2">
                    <div
                        class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search"
                        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for items">
                </div>
                <div class="flex justify-between items-center py-4 space-x-4">
                    <button type="button" id="archive-button"
                        class="inline-flex items-center px-4 py-3 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Archive
                    </button>
                    <button type="button" onclick="printCoaches()"
                        class="inline-flex items-center px-4 py-3 text-sm font-medium text-gray-700 bg-gray-200 border border-gray-200 rounded-md shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Print Coaches
                    </button>
                </div>


            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            LASTNAME
                        </th>
                        <th scope="col" class="px-6 py-3">
                            STUDENT NUMBER
                        </th>
                        <th scope="col" class="px-6 py-3">
                            SEX
                        </th>
                        <th scope="col" class="px-6 py-3">
                            STATUS
                        </th>

                        <th scope="col" class="px-6 py-3">
                            LastLogin
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coaches as $coach)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                            data-coach-id="{{ $coach->id }}">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-{{ $coach->id }}" name="selected_players[]"
                                        value="{{ $coach->id }}" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-{{ $coach->id }}" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $coach->lastname }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $coach->idnumber }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $coach->sex }}
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                    Active
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                {{ $coach->lastlogin ? \Carbon\Carbon::parse($coach->lastlogin)->format('Y-m-d') : 'N/A' }}

                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.view-coach', ['id' => $coach->id]) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">view</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>

    <script>
        function printCoaches() {
            fetch('{{ route('admin.print.coaches') }}')
                .then(response => response.text())
                .then(data => {
                    const printWindow = window.open('', '', 'height=600,width=800');
                    printWindow.document.write(data);
                    printWindow.document.close();
                    printWindow.onload = function() {
                        printWindow.print();
                        printWindow.onafterprint = function() {
                            printWindow.close();
                        };
                    };
                })
                .catch(error => console.error('Error fetching print content:', error));
        }
        document.getElementById('archive-button').addEventListener('click', function() {
            const form = document.getElementById('archive-form');
            const formData = new FormData(form);

            fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const selectedCheckboxes = document.querySelectorAll(
                            'input[name="selected_players[]"]:checked');
                        selectedCheckboxes.forEach(checkbox => {
                            const row = checkbox.closest('tr');
                            row.remove();
                        });
                    } else {
                        alert('An error occurred while archiving accounts.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while archiving accounts.');
                });
        });
    </script>
@endsection
