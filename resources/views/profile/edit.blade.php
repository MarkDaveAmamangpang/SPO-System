{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">

        </h2>
    </x-slot>
    <div class="bg-red-500 text-white py-2 px-4 rounded-md mb-1 mt-2">
        <h2 class="text-lg font-semibold">Editing Profile Information</h2>
    </div>

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

            <form method="post" action="{{ route('documents.store') }}" enctype="multipart/form-data">
                <div class="px-auto py-2">
                    <div class="bg-blue-900 text-white py-2 px-5 rounded-md mb-1 mt-2">
                        <h2 class="text-lg font-semibold">Document</h2>
                    </div>
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click
                                        to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                </p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" />
                        </label>
                    </div>

                </div>
            </form>

        </div>
        <div class="col-span-2">
            <div class="max-w-4xl mx-auto sm:px-4 lg:px-2">
                <div class="bg-yellow-900 text-white py-2 px-4 rounded-md mb-1">
                    <h2 class="text-lg font-semibold">Personal details</h2>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm  sm:rounded-lg border border-gray-400">
                    <div class="pl-4 text-gray-900 dark:text-gray-100">
                        <div class="border-t border-gray-100">
                            <dl class="divide-y divide-gray-100">
                                <div class="px-4 py-5 grid grid-cols-5 gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">
                                        First
                                        Name:
                                    </dt>
                                    <dd class="col-span-4 pr-5">
                                        <x-text-input id="firstname" name="firstname" type="text" :value="old('firstname', $user->firstname)"
                                            required autofocus autocomplete="given-name" class="w-full" />
                                    </dd>
                                </div>
                                <div class="px-4 py-5 grid grid-cols-5 gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">
                                        Middle Name:
                                    </dt>
                                    <dd class="col-span-4 pr-5">
                                        <x-text-input id="middlename" name="middlename" type="text" :value="old('middlename', $user->middlename)"
                                            required autofocus autocomplete="additional-name" class="w-full" />
                                    </dd>
                                </div>
                                <div class="px-4 py-5 sm:grid sm:grid-cols-5 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">
                                        LastName:
                                    </dt>
                                    <dd class="col-span-4 pr-5">
                                        <x-text-input id="lastname" name="lastname" type="text" :value="old('lastname', $user->lastname)"
                                            required autofocus autocomplete="family-name" class="w-full" />
                                    </dd>
                                </div>
                                <div class="px-4 py-5 sm:grid sm:grid-cols-5 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">
                                        ID Number:
                                    </dt>
                                    <dd class="col-span-4 pr-5">
                                        <x-text-input id="idnumber" name="idnumber" type="text" :value="old('idnumber', $user->idnumber)"
                                            required autofocus autocomplete="id-number" class="w-full" />
                                    </dd>
                                </div>
                                <div class="px-4 py-5 sm:grid sm:grid-cols-5 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">
                                        Suffix:
                                    </dt>
                                    <dd class="col-span-4 pr-5">
                                        <x-text-input id="suffix" name="suffix" type="text" :value="old('suffix', $user->suffix)"
                                            required autofocus autocomplete="honorific-suffix" class="w-full" />
                                    </dd>
                                </div>
                                <div class="px-4 py-5 sm:grid sm:grid-cols-5 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">
                                        Sex:
                                    </dt>
                                    <dd class="col-span-4 pr-5">
                                        <x-text-input id="sex" name="sex" type="text" :value="old('sex', $user->sex)"
                                            required autofocus autocomplete="sex" class="w-full" />
                                    </dd>
                                </div>
                                <div class="px-4 py-5 sm:grid sm:grid-cols-5 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">
                                        Birthdate:
                                    </dt>
                                    <dd class="col-span-4 pr-5">
                                        <x-text-input id="birthdate" name="birthdate" type="date" class="w-full"
                                            :value="old(
                                                'birthdate',
                                                $user->birthdate ? $user->birthdate->format('Y-m-d') : '',
                                            )" />
                                    </dd>
                                </div>
                                <div class="px-4 py-5 sm:grid sm:grid-cols-5 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">
                                        Email:
                                    </dt>
                                    <dd class="col-span-4 pr-5">
                                        <x-text-input id="email" name="email" type="email" class="w-full"
                                            :value="old('email', $user->email)" required autocomplete="username" />
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
</x-app-layout> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.add-documents-form')
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.add-achievements-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
