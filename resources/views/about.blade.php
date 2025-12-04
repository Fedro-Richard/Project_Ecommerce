@extends('layouts.app', ['assets' => ['resources/css/about.css', 'resources/js/about.js']])

@section('title', 'Cookie Co. - About Us')

@section('content')
<main class="flex-1">
                <!-- HeroSection -->
                <div class="px-4 sm:px-10 py-5">
                    <div class="max-w-6xl mx-auto">
                        <div class="@container">
                            <div class="@[480px]:p-4">
                                <div class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 rounded-lg items-center justify-center p-4 text-center hero-bg"
                                    data-alt="A warm, inviting shot of freshly baked cookies on a rustic wooden table.">
                                    <div class="flex flex-col gap-2 max-w-2xl">
                                        <h1
                                            class="font-serif text-white text-4xl font-bold leading-tight tracking-tight @[480px]:text-5xl @[480px]:font-bold">
                                            Baked with Love, From Our Kitchen to Yours.
                                        </h1>
                                        <h2
                                            class="text-white/90 text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal">
                                            Discover the story behind our irresistibly delicious, handcrafted cookies.
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FeatureSection (Brand Story) -->
                <div class="px-4 sm:px-10 py-10">
                    <div class="max-w-6xl mx-auto">
                        <div class="grid md:grid-cols-2 gap-8 md:gap-12 items-center">
                            <div class="w-full bg-center bg-no-repeat aspect-[4/3] bg-cover rounded-lg story-img"
                                data-alt="A baker's hands kneading dough on a floured surface."></div>
                            <div class="flex flex-col gap-4">
                                <h2
                                    class="font-serif text-brand-dark-chocolate text-[32px] font-bold leading-tight tracking-tight">
                                    How It All Began</h2>
                                <p class="text-brand-coffee text-base font-normal leading-relaxed">
                                    Our journey started in a small home kitchen with a passion for creating the perfect
                                    cookie. We believe in using only the finest, all-natural ingredients to bake treats
                                    that bring joy and comfort to every bite. What began as a simple hobby has blossomed
                                    into a beloved brand, but our core values remain the same: quality, community, and
                                    the simple happiness found in a perfectly baked cookie.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mission/Values Section -->
                <div class="px-4 sm:px-10 py-10 bg-brand-tan/20">
                    <div class="max-w-3xl mx-auto text-center">
                        <div class="flex flex-col items-center gap-4">
                            <div
                                class="flex items-center justify-center size-12 bg-brand-dark-chocolate text-brand-parchment rounded-full">
                                <span class="material-symbols-outlined text-3xl favorite-icon">favorite</span>
                            </div>
                            <h2
                                class="font-serif text-brand-dark-chocolate text-[32px] font-bold leading-tight tracking-tight">
                                Our Promise To You</h2>
                            <p class="text-brand-coffee text-base font-normal leading-relaxed">
                                At Cookie Co., we're committed to more than just baking. We promise to use only the
                                highest quality, ethically sourced ingredients. We promise that every cookie is baked
                                fresh with care and attention to detail. Most importantly, we promise to deliver a
                                moment of pure delight with every order, ensuring your satisfaction from the first click
                                to the last crumb.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Image Gallery -->
                <div class="px-4 sm:px-10 py-10">
                    <div class="max-w-6xl mx-auto">
                        <div class="flex flex-col gap-4">
                            <h2
                                class="font-serif text-brand-dark-chocolate text-[28px] font-bold leading-tight tracking-tight px-4 pb-3 pt-5 text-center">
                                The Art of the Cookie</h2>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 p-4">
                                <div class="flex flex-col gap-3">
                                    <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg gallery-img-1"
                                        data-alt="Close-up of high-quality chocolate chips in a bowl."></div>
                                </div>
                                <div class="flex flex-col gap-3">
                                    <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg gallery-img-2"
                                        data-alt="A team of bakers smiling and working together in a kitchen."></div>
                                </div>
                                <div class="flex flex-col gap-3">
                                    <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg gallery-img-3"
                                        data-alt="A row of perfectly shaped cookie dough balls on a baking sheet.">
                                    </div>
                                </div>
                                <div class="flex flex-col gap-3">
                                    <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg gallery-img-4"
                                        data-alt="Golden-brown cookies cooling on a wire rack."></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Social Media Section -->
                <div class="px-4 sm:px-10 py-10">
                    <div class="max-w-6xl mx-auto">
                        <div class="bg-brand-tan/40 rounded-lg p-8 text-center flex flex-col items-center gap-6">
                            <h3
                                class="font-serif text-brand-dark-chocolate text-2xl md:text-3xl font-bold leading-tight">
                                Join Our Sweet Community</h3>
                            <p class="text-brand-coffee max-w-lg">Follow our journey on social media for
                                behind-the-scenes peeks, new flavor announcements, and special offers!</p>
                            <div class="flex items-center justify-center gap-4">
                                <a aria-label="Instagram"
                                    class="flex items-center justify-center size-12 bg-brand-dark-chocolate text-brand-parchment rounded-full hover:bg-brand-coffee transition-colors"
                                    href="#">
                                    <svg aria-hidden="true" class="size-6" fill="currentColor" viewbox="0 0 24 24">
                                        <path clip-rule="evenodd"
                                            d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 012.792 2.792c.247.636.416 1.363.465 2.427.048 1.024.06 1.378.06 3.808s-.012 2.784-.06 3.808c-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-2.792 2.792c-.636.247-1.363.416-2.427.465-1.024.048-1.378.06-3.808.06s-2.784-.013-3.808-.06c-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-2.792-2.792c-.247-.636-.416-1.363-.465-2.427-.048-1.024-.06-1.378-.06-3.808s.012-2.784.06-3.808c.049-1.064.218-1.791.465-2.427a4.902 4.902 0 012.792-2.792c.636-.247 1.363-.416 2.427.465C9.53 2.013 9.884 2 12.315 2zM12 7a5 5 0 100 10 5 5 0 000-10zm0-2a7 7 0 110 14 7 7 0 010-14zm6.406-2.31a1.25 1.25 0 100 2.5 1.25 1.25 0 000-2.5z"
                                            fill-rule="evenodd"></path>
                                    </svg>
                                </a>
                                <a aria-label="Facebook"
                                    class="flex items-center justify-center size-12 bg-brand-dark-chocolate text-brand-parchment rounded-full hover:bg-brand-coffee transition-colors"
                                    href="#">
                                    <svg aria-hidden="true" class="size-6" fill="currentColor" viewbox="0 0 24 24">
                                        <path clip-rule="evenodd"
                                            d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                            fill-rule="evenodd"></path>
                                    </svg>
                                </a>
                                <a aria-label="TikTok"
                                    class="flex items-center justify-center size-12 bg-brand-dark-chocolate text-brand-parchment rounded-full hover:bg-brand-coffee transition-colors"
                                    href="#">
                                    <svg aria-hidden="true" class="size-6" fill="currentColor" viewbox="0 0 24 24">
                                        <path
                                            d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-2.43.05-4.86-.95-6.43-2.88-1.57-1.93-2.2-4.38-1.92-6.84.28-2.46 1.53-4.66 3.46-6.11 2.05-1.55 4.54-2.22 7.01-1.74.12 2.05.11 4.1-.03 6.13-.24.33-.5.64-.78.93-.46.46-1.02.82-1.62 1.05-1.06.41-2.22.54-3.36.31v-4.71c.14-.02.28-.04.42-.06 1.06-.14 2.06-.52 2.95-1.15.54-.38 1-1.03 1.2-1.74.17-.59.25-1.21.24-1.84h4.03Z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
@endsection