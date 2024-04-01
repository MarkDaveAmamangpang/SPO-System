<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{-- {{ __('Welcome, Player') }} --}}
            <p>Welcome, {{ Auth::user()->firstname }}</p>
        </h2>
    </x-slot>
    <div class="grid grid-cols-2 py-5">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 sm:rounded-lg">
                <div class="px-4 py-2">
                    <div class="sm:col-span-2">
                        <img class="h-80 w-80 rounded-full mx-auto" src="{{ Auth::user()->getImageURL() }}"
                            alt="Profile Picture">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-base font-semibold leading-7 text-gray-900 dark:text-gray-100">Player
                                Information
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500 dark:text-gray-100">Personal
                                details
                            </p>
                        </div>
                        <div class="mt-6 border-t border-gray-100">
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
                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
