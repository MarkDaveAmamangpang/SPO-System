@extends('layouts.layout')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li>
                        <div class="flex items-center">
                            <a href="{{ route('admin.player-accounts') }}"
                                class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Coaches
                                Lists</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Profile</span>
                        </div>
                    </li>
                </ol>
            </nav>


            <button onclick="window.print()"
                class="border border-blue-600 text-blue-600 px-4 py-2 rounded-md hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Print</button>
        </div>


        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-8">
            <div class="flex items-center mb-8">
                <img class="h-24 w-24 rounded-full mr-6" src="{{ $coach->getImageURL() }}" alt="Profile Picture">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $coach->firstname }}
                        {{ $coach->lastname }}</h2>
                    <p class="text-gray-600 dark:text-gray-400">{{ $coach->email }}</p>
                    <p class="text-gray-600 dark:text-gray-400">ID Number: {{ $coach->idnumber }}</p>
                </div>
            </div>

            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Personal Information</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <p class="text-gray-600 dark:text-gray-400"><span class="font-medium">Middle Name:</span>
                        {{ $coach->middlename }}</p>
                    <p class="text-gray-600 dark:text-gray-400"><span class="font-medium">Sex:</span> {{ $coach->sex }}
                    </p>
                    <p class="text-gray-600 dark:text-gray-400"><span class="font-medium">Birthdate:</span>
                        {{ $coach->birthdate ? date('Y-m-d', strtotime($coach->birthdate)) : 'N/A' }}</p>
                    <p class="text-gray-600 dark:text-gray-400"><span class="font-medium">Status:</span>
                        {{ $coach->isArchived() ? 'Archived' : 'Active' }}</p>
                    <p class="text-gray-600 dark:text-gray-400"><span class="font-medium">Last Login:</span>
                        {{ $coach->lastlogin ? \Carbon\Carbon::parse($coach->lastlogin)->format('Y-m-d') : 'N/A' }}</p>
                </div>
            </div>

            <div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Documents</h3>
                <ul role="list"
                    class="divide-y divide-gray-200 dark:divide-gray-700 rounded-md border border-gray-300 dark:border-gray-700">
                    @foreach ($coach->documents as $doc)
                        <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                            <div class="flex w-0 flex-1 items-center">
                                <svg class="h-5 w-5 flex-shrink-0 text-gray-400 dark:text-gray-500" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                    <a href="{{ $doc->getFileURL() }}" class="text-blue-600 hover:text-blue-500">
                                        {{ $doc->filename }}
                                    </a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
