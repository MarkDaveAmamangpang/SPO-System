@extends('layouts.layout')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Edit Award</h1>
    </div>

    <form action="{{ route('admin.award.update', $award->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="event" class="block text-sm font-medium text-gray-700 dark:text-white">Event</label>
            <input type="text" id="event" name="event" value="{{ $award->event }}"
                class="block w-full mt-1 text-sm text-gray-900 border-gray-300 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600">
        </div>
        <div class="mb-4">
            <label for="sportstype" class="block text-sm font-medium text-gray-700 dark:text-white">Sports Type</label>
            <input type="text" id="sportstype" name="sportstype" value="{{ $award->sportstype }}"
                class="block w-full mt-1 text-sm text-gray-900 border-gray-300 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600">
        </div>
        <div class="mb-4">
            <label for="placing" class="block text-sm font-medium text-gray-700 dark:text-white">Placing</label>
            <input type="text" id="placing" name="placing" value="{{ $award->placing }}"
                class="block w-full mt-1 text-sm text-gray-900 border-gray-300 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600">
        </div>
        <div class="mb-4">
            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md">Update
                Award</button>
        </div>
    </form>
@endsection
