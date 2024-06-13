<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Players</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        @media print {
            @page {
                size: A4;
                margin: 20mm;
            }

            body {
                font-size: 12px;
            }

            .print-table {
                width: 100%;
                border-collapse: collapse;
            }

            .print-table th,
            .print-table td {
                border: 1px solid #ddd;
                padding: 8px;
            }

            .print-table th {
                background-color: #f2f2f2;
            }
        }
    </style>
</head>

<body>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Players List</h2>
        <table class="print-table w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">LASTNAME</th>
                    <th class="px-6 py-3">STUDENT NUMBER</th>
                    <th class="px-6 py-3">SEX</th>
                    <th class="px-6 py-3">EMAIL</th>
                    <th class="px-6 py-3">STATUS</th>
                    {{-- <th class="px-6 py-3">LastLogin</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($players as $player)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $player->lastname }}</td>
                        <td class="px-6 py-4">{{ $player->idnumber }}</td>
                        <td class="px-6 py-4">{{ $player->sex }}</td>
                        <td class="px-6 py-4">{{ $player->email }}</td>
                        <td class="px-6 py-4">
                            <span
                                class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Active</span>
                        </td>
                        {{-- <td class="px-6 py-4">
                            {{ $player->lastlogin ? \Carbon\Carbon::parse($player->lastlogin)->format('Y-m-d') : 'N/A' }}
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
