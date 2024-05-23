<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information") }}
        </p>
    </header>

    {{-- <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form> --}}

    <form enctype="multipart/form-data" method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="firstname" :value="__('First Name')" />
            <x-text-input id="firstname" name="firstname" type="text" class="mt-1 block w-full" :value="old('firstname', $user->firstname)"
                required autofocus autocomplete="given-name" />
            <x-input-error class="mt-2" :messages="$errors->get('firstname')" />
        </div>

        <div>
            <x-input-label for="middlename" :value="__('Middle Name')" />
            <x-text-input id="middlename" name="middlename" type="text" class="mt-1 block w-full" :value="old('middlename', $user->middlename)"
                autocomplete="additional-name" />
            <x-input-error class="mt-2" :messages="$errors->get('middlename')" />
        </div>

        <div>
            <x-input-label for="lastname" :value="__('Last Name')" />
            <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full" :value="old('lastname', $user->lastname)"
                required autocomplete="family-name" />
            <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
        </div>

        <div>
            <x-input-label for="idnumber" :value="__('ID Number')" />
            <x-text-input id="idnumber" name="idnumber" type="text" class="mt-1 block w-full" :value="old('idnumber', $user->idnumber)"
                required autocomplete="idnumber" />
        </div>
        <x-input-error class="mt-2" :messages="$errors->get('idnumber')" />
        <div>
            <x-input-label for="suffix" :value="__('Suffix')" />
            <x-text-input id="suffix" name="suffix" type="text" class="mt-1 block w-full" :value="old('suffix', $user->suffix)"
                autocomplete="suffix" />
            <x-input-error class="mt-2" :messages="$errors->get('suffix')" />
        </div>

        <div>
            <x-input-label for="sex" :value="__('Sex')" />
            <select id="sex" name="sex" class="block mt-1 w-full">
                <option value="male" @if (old('sex', $user->sex) === 'male') selected @endif>Male</option>
                <option value="female" @if (old('sex', $user->sex) === 'female') selected @endif>Female</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('sex')" />
        </div>
        <div>
            <x-input-label for="type" :value="__('Type')" />
            <select id="type" name="type"
                class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                required>
                <option value="player">Player</option>
                <option value="coach">Coach</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('type')" />
        </div>

        <div>
            <x-input-label for="birthdate" :value="__('Birthdate')" />
            <x-text-input id="birthdate" name="birthdate" type="date" class="mt-1 block w-full" :value="old('birthdate', $user->birthdate ? $user->birthdate->format('Y-m-d') : '')" />
            <x-input-error class="mt-2" :messages="$errors->get('birthdate')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <label class="block mb-2 text-sm
        font-medium text-gray-900 dark:text-white"
                for="profile_picture">Upload
                a profile picture</label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="file_input" type="file" name="profile_picture" accept=".jpg, .jpeg, .png,">

        </div>

        <div class="flex items-center gap-4">
            <button type="submit"
                class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                save
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>


    </form>
</section>
