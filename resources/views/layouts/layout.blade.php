<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Open Sans Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/admindashboard.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="grid-container">

        <!-- Header -->
        <header class="header">
            <div class="menu-icon" onclick="openSidebar()">
                <span class="material-icons-outlined">menu</span>
            </div>
            <div class="header-left">
                {{-- <span class="material-icons-outlined">search</span> --}}
            </div>
            <div class="header-right">
                {{-- <span class="material-icons-outlined">account_circle</span> --}}

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </header>
        <!-- End Header -->

        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="sidebar-title">
                <div class="sidebar-brand">
                    <img src="{{ asset('img/LNULOGO.PNG') }}" class="logosize">
                </div>
                <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
            </div>

            <ul class="sidebar-list">
                <li class="sidebar-list-item">

                    <a href="{{ route('admin.admindashboard') }}">

                        <span class="material-icons-outlined">dashboard</span> Dashboard
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link" href="{{ route('admin.awards') }}">
                        <span class="material-icons-outlined">leaderboard</span> Awards
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link" href="{{ route('admin.player-accounts') }}">
                        <span class="material-icons-outlined">person</span> Players
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link" href="{{ route('admin.coaches-accounts') }}">
                        <span class="material-icons-outlined">supervisor_account</span> Coaches
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a class="side-link" href="{{ route('admin.archive-accounts') }}">
                        <span class="material-icons-outlined">archive</span> Archived accounts
                    </a>
            </ul>
        </aside>
        <!-- End Sidebar -->

        <!-- Main -->
        <main class="main-container">
            @yield('content')
        </main>


    </div>

    <script src="{{ asset('js/scripts.js') }}"></script>


</body>

</html>
