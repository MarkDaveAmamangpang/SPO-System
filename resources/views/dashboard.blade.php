<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{-- {{ __('Welcome, Player') }} --}}
            <p>Welcome {{ Auth::user()->type == 'player' ? 'Player' : 'Coach' }},
                {{ Auth::user()->firstname }}
            </p>
        </h2>
    </x-slot>
    <div class="grid grid-cols-3 py-5 px-3">
        <div class="max-w-2xl sm:px-4 lg:px-2">
            <div class="bg-white dark:bg-gray-800 border border-gray-400 sm:rounded-lg ">
                <div class="px-4 py-2">
                    <div class="sm:col-span-2">
                        <img class="h-72 w-72 rounded-full mx-auto" src="{{ Auth::user()->getImageURL() }}"
                            alt="Profile Picture">
                    </div>
                </div>
            </div>


            <div class="px-auto py-2">
                <div class="bg-blue-900 text-white py-2 px-5 rounded-md mb-1 mt-2">
                    <h2 class="text-lg font-semibold">Document</h2>
                </div>
                <dd class="bg-white dark:bg-gray-800 text-sm text-gray-900">
                    <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-400">

                        @foreach ($documents as $doc)
                            <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                <div class="flex w-0 flex-1 items-center">
                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                        <span class="truncate font-medium text-gray-900">Document:
                                            {{ $doc->filename }}</span>
                                    </div>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a href="{{ $doc->getFileURL() }}" target="_blank"
                                        class="font-medium text-indigo-600 hover:text-indigo-500">View</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </dd>
            </div>

        </div>
        <div class="col-span-2">
            <div class="max-w-4xl mx-auto sm:px-4 lg:px-2">
                <div class="bg-blue-900 text-white py-2 px-4 rounded-md mb-1">
                    <h2 class="text-lg font-semibold">Personal details</h2>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm  sm:rounded-lg border border-gray-400">
                    <div class="pl-4 text-gray-900 dark:text-gray-100">
                        <div class="border-t border-gray-100">
                            <dl class="divide-y divide-gray-100">
                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">First
                                        Name:
                                    </dt>
                                    <dd
                                        class="mt-1 text-sm leading-6 text-gray-700 dark:text-gray-100 sm:col-span-2 sm:mt-0">
                                        <p>{{ Auth::user()->firstname }}</p>
                                    </dd>
                                </div>
                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">
                                        Middle
                                        Name:
                                    </dt>
                                    <dd
                                        class="mt-1 text-sm leading-6 text-gray-700 dark:text-gray-100 sm:col-span-2 sm:mt-0">
                                        <p>{{ Auth::user()->middlename }}</p>
                                    </dd>
                                </div>
                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Last
                                        Name:
                                    </dt>
                                    <dd
                                        class="mt-1 text-sm leading-6 text-gray-700 dark:text-gray-100 sm:col-span-2 sm:mt-0">
                                        <p>{{ Auth::user()->lastname }}</p>
                                    </dd>
                                </div>
                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">ID
                                        Number:
                                    </dt>
                                    <dd
                                        class="mt-1 text-sm leading-6 text-gray-700 dark:text-gray-100 sm:col-span-2 sm:mt-0">
                                        <p>{{ Auth::user()->idnumber }}</p>
                                    </dd>
                                </div>
                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">
                                        Suffix:
                                    </dt>
                                    <dd
                                        class="mt-1 text-sm leading-6 text-gray-700 dark:text-gray-100 sm:col-span-2 sm:mt-0">
                                        <p>{{ Auth::user()->suffix ? Auth::user()->suffix : 'None' }}</p>
                                    </dd>
                                </div>
                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Sex:
                                    </dt>
                                    <dd
                                        class="mt-1 text-sm leading-6 text-gray-700 dark:text-gray-100 sm:col-span-2 sm:mt-0">
                                        <p>{{ Auth::user()->sex }}</p>
                                    </dd>
                                </div>
                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">
                                        Birthdate:
                                    </dt>
                                    <dd
                                        class="mt-1 text-sm leading-6 text-gray-700 dark:text-gray-100 sm:col-span-2 sm:mt-0">
                                        <p>{{ Auth::user()->birthdate ? date('Y-m-d', strtotime(Auth::user()->birthdate)) : 'None' }}
                                        </p>
                                    </dd>
                                </div>
                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">
                                        Email:
                                    </dt>
                                    <dd
                                        class="mt-1 text-sm leading-6 text-gray-700 dark:text-gray-100 sm:col-span-2 sm:mt-0">
                                        <p>{{ Auth::user()->email }}</p>
                                    </dd>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-4xl mx-auto sm:px-4 lg:px-2">
                <div class="bg-blue-900 text-white py-2 px-4 rounded-md mt-2">
                    <h2 class="text-lg font-semibold">Achievements</h2>
                </div>

                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-400 mt-1">
                    <div class="pl-4 text-gray-900 dark:text-gray-100">
                        <div class="border-t border-gray-100">
                            <dl class="divide-y divide-gray-100">
                                @foreach ($achievements as $awards)
                                    <div class="px-2 py-4 sm:grid sm:grid-cols-3 sm:gap-1 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">
                                            <p>{{ $awards->event }}</p>
                                        </dt>
                                        <dt class="text-sm leading-6 text-gray-700 dark:text-gray-100 sm:mt-0">
                                            <p>{{ $awards->sportstype }}</p>
                                        </dt>
                                        <dt class="text-sm leading-6 text-gray-700 dark:text-gray-100 sm:mt-0">
                                            <p>{{ $awards->placing }}</p>
                                        </dt>

                                    </div>
                                @endforeach
                            </dl>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>





</x-app-layout>
