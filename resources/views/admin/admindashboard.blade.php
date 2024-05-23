@extends('layouts.layout')
@section('content')
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
            <div id="default-carousel" class="relative w-full" data-carousel="slide">

                <div class="relative h-72 overflow-hidden rounded-lg">

                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('carousel/sports1.jpg') }}">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('carousel/sports2.jpg') }}"
                            class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="Sports 2">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('carousel/sports3.jpg') }}"
                            class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="Sports 3">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('carousel/sports4.jpg') }}"
                            class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="Sports 4">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('carousel/sports5.jpg') }}"
                            class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="Sports 5">
                    </div>
                </div>
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                        data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                        data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                        data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                        data-carousel-slide-to="4"></button>
                </div>
                <button type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
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
@endsection
