@extends('layouts.app', ['assets' => ['resources/css/home.css', 'resources/js/home.js']])

@section('title', 'Cookie Co. - Freshly Baked Artisanal Cookies')

@section('content')
<html>
    
<body>
<main>
 
    <div class="px-4 lg:px-10 flex flex-1 justify-center py-5">
        <div class="layout-content-container flex flex-col w-full max-w-7xl">
            <div class="@container">
                <div class="@[480px]:p-0">
                    <div class="flex min-h-[520px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 rounded-xl items-center justify-center p-4 text-center hero-section"
                        data-alt="A delicious spread of freshly baked cookies on a rustic wooden table">
                        <div class="flex flex-col gap-4">
                            <h1
                                class="text-background-light text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-6xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]">
                                Freshly Baked Artisanal Cookies
                            </h1>
                            <h2
                                class="text-background-light text-base font-normal leading-normal @[480px]:text-lg @[480px]:font-normal @[480px]:leading-normal">
                                Made with love and the finest ingredients, delivered warm to your door.
                            </h2>
                        </div>
                        <a href="{{ url('/shop') }}"
                            class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-5 bg-primary text-white hover:bg-primary-secondary dark:bg-primary dark:hover:bg-primary-secondary transition-colors text-base font-bold leading-normal tracking-[0.015em]">
                            <span class="truncate">Shop All Cookies</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SectionHeader for Featured Products -->
    <div class="px-4 lg:px-10 flex flex-1 justify-center py-5">
        <div class="layout-content-container flex flex-col w-full max-w-7xl">
            <h2
                class="text-primary dark:text-background-light text-3xl font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5 text-center">
                Our Featured Cookies</h2>
        </div>
    </div>
    <!-- ImageGrid for Featured Products -->
    <div class="px-4 lg:px-10 flex flex-1 justify-center pt-2 pb-10">
        <div class="layout-content-container flex flex-col w-full max-w-7xl">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 p-4">
                <div class="flex flex-col gap-3 pb-3 group">
                    <div
                        class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl overflow-hidden">
                        <div class="w-full h-full bg-cover bg-center transform transition-transform duration-300 ease-in-out group-hover:scale-110 cookie-img-1"
                            data-alt="A classic chocolate chip cookie with large chunks of chocolate"></div>
                    </div>
                    <div>
                        <p class="text-primary dark:text-background-light text-lg font-bold leading-normal">
                            Chocolate Chunk Classic</p>
                        <p
                            class="text-primary-secondary dark:text-accent text-sm font-normal leading-normal">
                            The timeless favorite, packed with rich chocolate chunks.</p>
                        <p
                            class="text-primary-secondary dark:text-accent text-sm font-medium leading-normal mt-1">
                            $3.50</p>
                    </div>
                    <button
                        class="mt-2 flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary/20 text-primary-secondary hover:bg-primary hover:text-white dark:bg-accent/20 dark:text-accent dark:hover:bg-primary dark:hover:text-white transition-colors text-sm font-bold leading-normal tracking-[0.015em]">
                        <span class="truncate">Add to Cart</span>
                    </button>
                </div>
                <div class="flex flex-col gap-3 pb-3 group">
                    <div
                        class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl overflow-hidden">
                        <div class="w-full h-full bg-cover bg-center transform transition-transform duration-300 ease-in-out group-hover:scale-110 cookie-img-2"
                            data-alt="An oatmeal raisin cookie with visible spices"></div>
                    </div>
                    <div>
                        <p class="text-primary dark:text-background-light text-lg font-bold leading-normal">
                            Oatmeal Raisin Spice</p>
                        <p
                            class="text-primary-secondary dark:text-accent text-sm font-normal leading-normal">
                            A warm and comforting classic with a hint of cinnamon.</p>
                        <p
                            class="text-primary-secondary dark:text-accent text-sm font-medium leading-normal mt-1">
                            $3.50</p>
                    </div>
                    <button
                        class="mt-2 flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary/20 text-primary-secondary hover:bg-primary hover:text-white dark:bg-accent/20 dark:text-accent dark:hover:bg-primary dark:hover:text-white transition-colors text-sm font-bold leading-normal tracking-[0.015em]">
                        <span class="truncate">Add to Cart</span>
                    </button>
                </div>
                <div class="flex flex-col gap-3 pb-3 group">
                    <div
                        class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl overflow-hidden">
                        <div class="w-full h-full bg-cover bg-center transform transition-transform duration-300 ease-in-out group-hover:scale-110 cookie-img-3"
                            data-alt="A white chocolate macadamia nut cookie with creamy white chocolate chips">
                        </div>
                    </div>
                    <div>
                        <p class="text-primary dark:text-background-light text-lg font-bold leading-normal">
                            White Chocolate Macadamia</p>
                        <p
                            class="text-primary-secondary dark:text-accent text-sm font-normal leading-normal">
                            Creamy white chocolate meets crunchy macadamia nuts.</p>
                        <p
                            class="text-primary-secondary dark:text-accent text-sm font-medium leading-normal mt-1">
                            $3.75</p>
                    </div>
                    <button
                        class="mt-2 flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary/20 text-primary-secondary hover:bg-primary hover:text-white dark:bg-accent/20 dark:text-accent dark:hover:bg-primary dark:hover:text-white transition-colors text-sm font-bold leading-normal tracking-[0.015em]">
                        <span class="truncate">Add to Cart</span>
                    </button>
                </div>
                <div class="flex flex-col gap-3 pb-3 group">
                    <div
                        class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl overflow-hidden">
                        <div class="w-full h-full bg-cover bg-center transform transition-transform duration-300 ease-in-out group-hover:scale-110 cookie-img-4"
                            data-alt="A dark and rich double fudge brownie cookie"></div>
                    </div>
                    <div>
                        <p class="text-primary dark:text-background-light text-lg font-bold leading-normal">
                            Double Fudge Brownie</p>
                        <p
                            class="text-primary-secondary dark:text-accent text-sm font-normal leading-normal">
                            For the ultimate chocolate lover, dense and decadent.</p>
                        <p
                            class="text-primary-secondary dark:text-accent text-sm font-medium leading-normal mt-1">
                            $3.75</p>
                    </div>
                    <button
                        class="mt-2 flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary/20 text-primary-secondary hover:bg-primary hover:text-white dark:bg-accent/20 dark:text-accent dark:hover:bg-primary dark:hover:text-white transition-colors text-sm font-bold leading-normal tracking-[0.015em]">
                        <span class="truncate">Add to Cart</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- About Us Section -->
    <div class="px-4 lg:px-10 flex flex-1 justify-center py-10">
        <div
            class="layout-content-container w-full max-w-7xl bg-accent/20 dark:bg-accent/10 rounded-xl p-8 md:p-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center">
                <div class="w-full aspect-[4/3] bg-cover bg-center rounded-lg about-us-img"
                    data-alt="A warm, inviting image of the Cookie Co. bakery kitchen"></div>
                <div class="flex flex-col gap-4">
                    <h2
                        class="text-primary dark:text-background-light text-3xl font-bold leading-tight tracking-[-0.015em]">
                        Our Story</h2>
                    <p class="text-primary-secondary dark:text-accent text-base leading-relaxed">
                        It all started in a small kitchen with a big dream: to create the perfect cookie. At
                        Cookie Co., we believe that the best treats are made with passion and the finest
                        ingredients. Every cookie is a piece of our heart, baked from scratch daily to bring
                        a moment of joy to your day. We're more than just a bakery; we're a community of
                        cookie lovers sharing a sweet tradition.
                    </p>
                    <a href="{{ url('/about') }}"
                        class="mt-4 flex w-fit cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-5 bg-primary text-white hover:bg-primary-secondary dark:bg-primary dark:hover:bg-primary-secondary transition-colors text-base font-bold leading-normal tracking-[0.015em]">
                        <span class="truncate">Learn More</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@include('bot')
    </body>
</html>
@endsection