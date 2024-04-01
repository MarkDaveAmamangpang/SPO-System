<div>
    <x-input-label for="achievement" :value="__('Achievement')" />
    <x-text-input id="achievement" name="achievement" type="text" class="mt-1 block
        w-full" :value="old('achievement')"
        required />
    <x-input-error class="mt-2" :messages="$errors->get('achievement')" />
</div>
<div>
    <x-input-label for="date" :value="__('Date')" />
    <x-text-input id="date" name="date" type="date" class="mt-1 block
        w-full" :value="old('date')"
        required />
    <x-input-error class="mt-2" :messages="$errors->get('date')" />
</div>
<div>
    <x-input-label for="description" :value="__('Description')" />
    <x-text-input id="description" name="description" type="text" class="mt-1 block
        w-full" :value="old('description')"
        required />
    <x-input-error class="mt-2" :messages="$errors->get('description')" />

</div>
