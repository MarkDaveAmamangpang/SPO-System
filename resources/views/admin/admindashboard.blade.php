    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Admin Dashboard</title>

        <!-- Open Sans Font -->
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap"
            rel="stylesheet">

        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/admindashboard.css') }}">
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
                    <span class="material-icons-outlined">account_circle</span>
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
                        <a href="#" class="sidebar-link" data-url="{{ route('admin.awards') }}">
                            <span class="material-icons-outlined">leaderboard</span> Awards
                        </a>
                    </li>
                    <li class="sidebar-list-item">
                        <a href="#"class="sidebar-link" data-url="{{ route('admin.player-accounts') }}">
                            <span class="material-icons-outlined">person</span> Players
                        </a>
                    </li>
                    <li class="sidebar-list-item">
                        <a href="#" class="sidebar-link" data-url="{{ route('admin.coaches-accounts') }}">
                            <span class="material-icons-outlined">supervisor_account</span> Coaches
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- End Sidebar -->

            <!-- Main -->
            <main class="main-container">
                <div class="main-title">
                    <h2>DASHBOARD</h2>
                </div>

                <div class="main-cards">

                    <div class="card">
                        <div class="card-inner">
                            <h2>Active Coaches</h2>
                            <span class="material-icons-outlined">supervisor_account</span>
                        </div>

                        <h1>20</h1>
                    </div>

                    <div class="card">
                        <div class="card-inner">
                            <h2>Active Players</h2>
                            <span class="material-icons-outlined">subscriptions</span>
                        </div>
                        <h1>230</h1>
                    </div>

                    <div class="card">
                        <div class="card-inner">
                            <h2>Achieved awards</h2>
                            <span class="material-icons-outlined">groups</span>
                        </div>
                        <h1>560</h1>
                    </div>

                    <div class="card">
                        <div class="card-inner">
                            <h2>Sports Event Attended</h2>
                            <span class="material-icons-outlined">
                                event_available
                            </span>
                        </div>
                        <h1>200</h1>
                    </div>

                </div>

                <div class="products">

                    <div class="product-card">
                        <h2 class="product-description">Latest Updates</h2>
                        <p class="text-secondary">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce laoreet facilisis nulla,
                            consectetur pulvinar diam. Aliquam tempus vel quam.
                        </p>
                        <button type="button" class="product-button">
                            <span class="material-icons-outlined">add</span>
                        </button>
                    </div>

                    <div class="social-media">
                        <div class="product">

                            <div>
                                <div class="product-icon background-red">
                                    <i class="material-icons-outlined">supervisor_account</i>
                                </div>
                                <h1 class="text-red">+20</h1>
                                <p class="text-secondary">Newly assigned coaches.</p>
                            </div>

                            <div>
                                <div class="product-icon background-green">
                                    <i class="bi bi-person-check"></i>
                                </div>
                                <h1 class="text-green">+15</h1>
                                <p class="text-secondary">Newly added players</p>
                            </div>

                            <div>
                                <div class="product-icon background-orange">
                                    <i class="bi bi-award-fill"></i>
                                </div>
                                <h1 class="text-orange">+10</h1>
                                <p class="text-secondary">
                                    awards received by players and coaches in the last scuaa event
                                </p>
                            </div>

                            <div>
                                <div class="product-icon background-blue">
                                    <i class="bi bi-linkedin"></i>
                                </div>
                                <h1 class="text-blue">+102</h1>
                                <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>

                        </div>
                    </div>

                </div>
            </main>


        </div>

        <script src="{{ asset('js/scripts.js') }}"></script>
        <script>
            // Add an event listener to all sidebar links
            document.querySelectorAll('.sidebar-link').forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent the default link behavior

                    // Fetch the URL from the data-url attribute
                    const url = this.getAttribute('data-url');

                    // Fetch the content using AJAX
                    fetch(url)
                        .then(response => response.text())
                        .then(data => {
                            // Update the main container with the loaded content
                            document.querySelector('.main-container').innerHTML = data;
                        })
                        .catch(error => console.error('Error fetching content:', error));
                });
            });
        </script>

    </body>

    </html>
