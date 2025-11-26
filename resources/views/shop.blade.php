@extends('layouts.app', ['assets' => ['resources/css/shop.css', 'resources/js/shop.js']])

@section('title', 'Cookie Co. - Shop')

@section('content')
<main class="flex flex-col gap-8 py-8 px-4 sm:px-6">
    <div class="text-center p-4">
        <p class="text-secondary dark:text-tertiary text-4xl font-black leading-tight tracking-[-0.033em]">
            Our Freshly Baked Cookies</p>
    </div>
    <div class="flex flex-col sm:flex-row gap-4 justify-between items-center">
        <div class="flex gap-2 p-3 flex-wrap">
            <button
                class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-full bg-primary text-white pl-4 pr-4 text-sm font-medium">All
                Cookies</button>
            <button
                class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-full bg-tertiary/20 dark:bg-tertiary/30 text-secondary dark:text-tertiary hover:bg-tertiary/30 dark:hover:bg-tertiary/40 pl-4 pr-4 text-sm font-medium">Chocolate
                Chip</button>
            <button
                class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-full bg-tertiary/20 dark:bg-tertiary/30 text-secondary dark:text-tertiary hover:bg-tertiary/30 dark:hover:bg-tertiary/40 pl-4 pr-4 text-sm font-medium">Oatmeal</button>
            <button
                class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-full bg-tertiary/20 dark:bg-tertiary/30 text-secondary dark:text-tertiary hover:bg-tertiary/30 dark:hover:bg-tertiary/40 pl-4 pr-4 text-sm font-medium">Vegan</button>
        </div>
        <div class="flex items-center gap-2">
            <span class="text-sm text-secondary dark:text-tertiary">Sort by:</span>
            <button
                class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-full bg-tertiary/20 dark:bg-tertiary/30 pl-4 pr-3 text-secondary dark:text-tertiary hover:bg-tertiary/30 dark:hover:bg-tertiary/40">
                <p class="text-sm font-medium leading-normal">Popularity</p>
                <span class="material-symbols-outlined text-xl">expand_more</span>
            </button>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <div
            class="flex flex-col gap-4 bg-card-light dark:bg-card-dark p-4 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
            <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg cookie-1"
                data-alt="A freshly baked classic chocolate chip cookie on a white background."></div>
            <div class="flex flex-col gap-2 flex-grow">
                <p class="text-primary dark:text-white text-lg font-bold leading-normal">Classic Chocolate
                    Chip</p>
                <p class="text-secondary dark:text-tertiary text-md font-medium leading-normal">$3.50</p>
                <a href="{{ url('/productdetail') }}" class="text-tertiary text-sm font-normal leading-normal cursor-pointer hover:underline">
                    View Details</a>
            </div>
            <button
                class="mt-auto w-full flex items-center justify-center h-10 rounded-lg bg-primary text-white text-sm font-bold hover:bg-primary/90 transition-colors">Add
                to Cart</button>
        </div>
        <div
            class="flex flex-col gap-4 bg-card-light dark:bg-card-dark p-4 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
            <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg cookie-2"
                data-alt="A stack of hearty oatmeal raisin cookies."></div>
            <div class="flex flex-col gap-2 flex-grow">
                <p class="text-primary dark:text-white text-lg font-bold leading-normal">Hearty Oatmeal
                    Raisin</p>
                <p class="text-secondary dark:text-tertiary text-md font-medium leading-normal">$3.50</p>
                <a href="{{ url('/productdetail') }}" class="text-tertiary text-sm font-normal leading-normal cursor-pointer hover:underline">
                    View Details</a>
            </div>
            <button
                class="mt-auto w-full flex items-center justify-center h-10 rounded-lg bg-primary text-white text-sm font-bold hover:bg-primary/90 transition-colors">Add
                to Cart</button>
        </div>
        <div
            class="flex flex-col gap-4 bg-card-light dark:bg-card-dark p-4 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
            <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg cookie-3"
                data-alt="A vegan peanut butter cookie with a bite taken out."></div>
            <div class="flex flex-col gap-2 flex-grow">
                <p class="text-primary dark:text-white text-lg font-bold leading-normal">Vegan Peanut Butter
                </p>
                <p class="text-secondary dark:text-tertiary text-md font-medium leading-normal">$4.00</p>
                <a href="{{ url('/productdetail') }}" class="text-tertiary text-sm font-normal leading-normal cursor-pointer hover:underline">
                    View Details</a>
            </div>
            <button
                class="mt-auto w-full flex items-center justify-center h-10 rounded-lg bg-primary text-white text-sm font-bold hover:bg-primary/90 transition-colors">Add
                to Cart</button>
        </div>
        <div
            class="flex flex-col gap-4 bg-card-light dark:bg-card-dark p-4 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
            <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg cookie-4"
                data-alt="A rich and decadent double chocolate fudge cookie."></div>
            <div class="flex flex-col gap-2 flex-grow">
                <p class="text-primary dark:text-white text-lg font-bold leading-normal">Double Chocolate
                    Fudge</p>
                <p class="text-secondary dark:text-tertiary text-md font-medium leading-normal">$3.75</p>
                <a href="{{ url('/productdetail') }}" class="text-tertiary text-sm font-normal leading-normal cursor-pointer hover:underline">
                    View Details</a>
            </div>
            <button
                class="mt-auto w-full flex items-center justify-center h-10 rounded-lg bg-primary text-white text-sm font-bold hover:bg-primary/90 transition-colors">Add
                to Cart</button>
        </div>
        <div
            class="flex flex-col gap-4 bg-card-light dark:bg-card-dark p-4 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
            <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg cookie-5"
                data-alt="A cinnamon snickerdoodle cookie covered in cinnamon sugar."></div>
            <div class="flex flex-col gap-2 flex-grow">
                <p class="text-primary dark:text-white text-lg font-bold leading-normal">Cinnamon
                    Snickerdoodle</p>
                <p class="text-secondary dark:text-tertiary text-md font-medium leading-normal">$3.50</p>
                <a href="{{ url('/productdetail') }}" class="text-tertiary text-sm font-normal leading-normal cursor-pointer hover:underline">
                    View Details</a>
            </div>
            <button
                class="mt-auto w-full flex items-center justify-center h-10 rounded-lg bg-primary text-white text-sm font-bold hover:bg-primary/90 transition-colors">Add
                to Cart</button>
        </div>
        <div
            class="flex flex-col gap-4 bg-card-light dark:bg-card-dark p-4 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
            <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg cookie-6"
                data-alt="A gluten-free almond flour cookie."></div>
            <div class="flex flex-col gap-2 flex-grow">
                <p class="text-primary dark:text-white text-lg font-bold leading-normal">Gluten-Free Almond
                </p>
                <p class="text-secondary dark:text-tertiary text-md font-medium leading-normal">$4.25</p>
                <a href="{{ url('/productdetail') }}" class="text-tertiary text-sm font-normal leading-normal cursor-pointer hover:underline">
                    View Details</a>
            </div>
            <button
                class="mt-auto w-full flex items-center justify-center h-10 rounded-lg bg-primary text-white text-sm font-bold hover:bg-primary/90 transition-colors">Add
                to Cart</button>
        </div>
        <div
            class="flex flex-col gap-4 bg-card-light dark:bg-card-dark p-4 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
            <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg cookie-7"
                data-alt="A lemon shortbread cookie with a light glaze."></div>
            <div class="flex flex-col gap-2 flex-grow">
                <p class="text-primary dark:text-white text-lg font-bold leading-normal">Lemon Shortbread
                </p>
                <p class="text-secondary dark:text-tertiary text-md font-medium leading-normal">$3.75</p>
                <a href="{{ url('/productdetail') }}" class="text-tertiary text-sm font-normal leading-normal cursor-pointer hover:underline">
                    View Details</a>
            </div>
            <button
                class="mt-auto w-full flex items-center justify-center h-10 rounded-lg bg-primary text-white text-sm font-bold hover:bg-primary/90 transition-colors">Add
                to Cart</button>
        </div>
        <div
            class="flex flex-col gap-4 bg-card-light dark:bg-card-dark p-4 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
            <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg cookie-8"
                data-alt="A star-shaped gingerbread cookie with icing."></div>
            <div class="flex flex-col gap-2 flex-grow">
                <p class="text-primary dark:text-white text-lg font-bold leading-normal">Gingerbread Star
                </p>
                <p class="text-secondary dark:text-tertiary text-md font-medium leading-normal">$4.00</p>
                <a href="{{ url('/productdetail') }}" class="text-tertiary text-sm font-normal leading-normal cursor-pointer hover:underline">
                    View Details</a>
            </div>
            <button
                class="mt-auto w-full flex items-center justify-center h-10 rounded-lg bg-primary text-white text-sm font-bold hover:bg-primary/90 transition-colors">Add
                to Cart</button>
        </div>
    </div>
    <div class="flex items-center justify-center p-4">
        <a class="flex size-10 items-center justify-center text-secondary dark:text-tertiary hover:text-primary dark:hover:text-white"
            href="#">
            <span class="material-symbols-outlined">chevron_left</span>
        </a>
        <a class="text-sm font-bold leading-normal tracking-[0.015em] flex size-10 items-center justify-center text-white rounded-full bg-primary"
            href="#">1</a>
        <span
            class="text-sm font-normal leading-normal flex size-10 items-center justify-center text-secondary dark:text-tertiary rounded-full">...</span>
        <a class="flex size-10 items-center justify-center text-secondary dark:text-tertiary hover:text-primary dark:hover:text-white"
            href="#">
            <span class="material-symbols-outlined">chevron_right</span>
        </a>
    </div>
</main>
@endsection

