@extends('layouts.layout')
@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
            Archived Accounts
        </h1>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">LASTNAME</th>
                    <th scope="col" class="px-6 py-3">ID NUMBER</th>
                    <th scope="col" class="px-6 py-3">SEX</th>
                    <th scope="col" class="px-6 py-3">TYPE</th>
                    <th scope="col" class="px-6 py-3">ARCHIVED AT</th>
                    <th scope="col" class="px-6 py-3">LAST LOGIN</th>
                    <th scope="col" class="px-6 py-3">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($archivedUsers as $user)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->lastname }}
                        </td>
                        <td class="px-6 py-4">{{ $user->idnumber }}</td>
                        <td class="px-6 py-4">{{ $user->sex }}</td>
                        <td class="px-6 py-4">{{ $user->user_type }} </td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($user->archived_at)->format('Y-m-d') }}</td>
                        <td class="px-6 py-4">
                            {{ $user->lastlogin ? \Carbon\Carbon::parse($user->lastlogin)->format('Y-m-d') : 'N/A' }}</td>
                        <td class="px-6 py-4">
                            <form action="{{ route('admin.unarchive', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="text-blue-600 dark:text-blue-500 hover:underline">
                                    Unarchive
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
