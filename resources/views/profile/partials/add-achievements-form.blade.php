<form method="post" action="{{ route('achievements.store') }}" type="">
    @csrf
    <div>
        <x-input-label for="event" :value="__('Event')" />
        <x-text-input id="event" name="event" type="text" class="mt-1 block w-full" :value="$achievement->event ?? old('event')" required />
        <x-input-error class="mt-2" :messages="$errors->get('event')" />
    </div>

    <div>
        <x-input-label for="sportstype" :value="__('Sports Type')" />
        <x-text-input id="sportstype" name="sportstype" type="text" class="mt-1 block w-full" :value="$achievement->sportstype ?? old('sportstype')"
            required />
        <x-input-error class="mt-2" :messages="$errors->get('sportstype')" />
    </div>

    <div>
        <x-input-label for="placing" :value="__('Placing')" />
        <x-text-input id="placing" name="placing" type="text" class="mt-1 block w-full" :value="$achievement->placing ?? old('placing')"
            required />
        <x-input-error class="mt-2" :messages="$errors->get('placing')" />
    </div>

    <button
        class="block w-full px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-lg hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700 transition duration-150 ease-in-out"
        type="submit">Add achievement</button>

</form>
