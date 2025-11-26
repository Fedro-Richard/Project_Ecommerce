<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>About Us - Cookie Co.</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&amp;family=Lora:ital,wght@0,400..700;1,400..700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
   @vite(['resources/css/about.css', 'resources/js/about.js'])
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-primary-secondary">
    <div class="relative flex min-h-screen w-full flex-col group/design-root overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <!-- TopNavBar -->
            <header class="sticky top-0 z-50 w-full bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-sm">
                <div class="px-4 lg:px-10 flex justify-center">
                    <div
                        class="flex items-center justify-between whitespace-nowrap border-b border-solid border-accent/30 py-4 w-full max-w-7xl">
                        <div class="flex items-center gap-4 text-primary dark:text-background-light">
                            <div class="size-6 text-primary dark:text-background-light">
                                <svg fill="currentColor" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M24 45.8096C19.6865 45.8096 15.4698 44.5305 11.8832 42.134C8.29667 39.7376 5.50128 36.3314 3.85056 32.3462C2.19985 28.361 1.76794 23.9758 2.60947 19.7452C3.451 15.5145 5.52816 11.6284 8.57829 8.5783C11.6284 5.52817 15.5145 3.45101 19.7452 2.60948C23.9758 1.76795 28.361 2.19986 32.3462 3.85057C36.3314 5.50129 39.7376 8.29668 42.134 11.8833C44.5305 15.4698 45.8096 19.6865 45.8096 24L24 24L24 45.8096Z">
                                    </path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold leading-tight tracking-[-0.015em]">Cookie Co.</h2>
                        </div>
                        <nav class="hidden md:flex flex-1 justify-center gap-8">
                            <a class="text-primary-secondary dark:text-background-light text-sm font-medium leading-normal hover:text-primary dark:hover:text-white transition-colors"
                                href="/home">Home</a>
                            <a class="text-primary-secondary dark:text-background-light text-sm font-medium leading-normal hover:text-primary dark:hover:text-white transition-colors"
                                href="/shop">Shop</a>
                            <a class="text-primary-secondary dark:text-background-light text-sm font-medium leading-normal hover:text-primary dark:hover:text-white transition-colors"
                                href="/about">About Us</a>
                            <a class="text-primary-secondary dark:text-background-light text-sm font-medium leading-normal hover:text-primary dark:hover:text-white transition-colors"
                                href="/transaction">Transactions</a>
                        </nav>
                        <div class="flex items-center gap-4">
                            <button
                                class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-transparent text-primary-secondary dark:text-background-light hover:bg-accent/20 dark:hover:bg-accent/10 transition-colors gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5">
                                <span class="material-symbols-outlined text-xl">shopping_cart</span>
                            </button>
                            <div
                                class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 user-profile-pic">
                            </div>
                        </div>
                    </div>
                </div>
            </header>
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
            <!-- Footer -->
            <footer class="bg-accent/20 dark:bg-accent/10 mt-10">
                <div class="px-4 lg:px-10 flex flex-1 justify-center py-10">
                    <div class="layout-content-container w-full max-w-7xl">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center md:text-left">
                            <div class="flex flex-col items-center md:items-start gap-2">
                                <h3 class="text-lg font-bold text-primary dark:text-background-light">Cookie Co.</h3>
                                <p class="text-sm text-primary-secondary dark:text-accent">Baking happiness, one cookie
                                    at a time.</p>
                            </div>
                            <div class="flex flex-col gap-2">
                                <h4 class="font-semibold text-primary-secondary dark:text-background-light">Shop</h4>
                                <a class="text-sm text-primary-secondary dark:text-accent hover:text-primary dark:hover:text-white transition-colors"
                                    href="#">All Cookies</a>
                                <a class="text-sm text-primary-secondary dark:text-accent hover:text-primary dark:hover:text-white transition-colors"
                                    href="#">Gifts &amp; Bundles</a>
                                <a class="text-sm text-primary-secondary dark:text-accent hover:text-primary dark:hover:text-white transition-colors"
                                    href="#">Subscriptions</a>
                            </div>
                            <div class="flex flex-col gap-2">
                                <h4 class="font-semibold text-primary-secondary dark:text-background-light">Support</h4>
                                <a class="text-sm text-primary-secondary dark:text-accent hover:text-primary dark:hover:text-white transition-colors"
                                    href="#">Contact Us</a>
                                <a class="text-sm text-primary-secondary dark:text-accent hover:text-primary dark:hover:text-white transition-colors"
                                    href="#">FAQ</a>
                                <a class="text-sm text-primary-secondary dark:text-accent hover:text-primary dark:hover:text-white transition-colors"
                                    href="#">Shipping</a>
                            </div>
                            <div class="flex flex-col gap-2">
                                <h4 class="font-semibold text-primary-secondary dark:text-background-light">Follow Us
                                </h4>
                                <div class="flex justify-center md:justify-start gap-4">
                                    <a class="text-primary-secondary dark:text-accent hover:text-primary dark:hover:text-white transition-colors"
                                        data-alt="Instagram logo" href="#">
                                        <svg class="w-6 h-6" fill="currentColor" viewbox="0 0 24 24">
                                            <path
                                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.85s-.011 3.584-.069 4.85c-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07s-3.584-.012-4.85-.07c-3.252-.148-4.771-1.691-4.919-4.919-.058-1.265-.069-1.645-.069-4.85s.011-3.584.069-4.85c.149-3.225 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.85-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.358-.2 6.78-2.618 6.98-6.98.059-1.281.073-1.689.073-4.948s-.014-3.667-.072-4.947c-.2-4.358-2.618-6.78-6.98-6.98-1.281-.059-1.689-.073-4.948-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.162 6.162 6.162 6.162-2.759 6.162-6.162-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4s1.791-4 4-4 4 1.79 4 4-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44 1.441-.645 1.441-1.44c0-.795-.645-1.44-1.441-1.44z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a class="text-primary-secondary dark:text-accent hover:text-primary dark:hover:text-white transition-colors"
                                        data-alt="Facebook logo" href="#">
                                        <svg class="w-6 h-6" fill="currentColor" viewbox="0 0 24 24">
                                            <path
                                                d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a class="text-primary-secondary dark:text-accent hover:text-primary dark:hover:text-white transition-colors"
                                        data-alt="Twitter logo" href="#">
                                        <svg class="w-6 h-6" fill="currentColor" viewbox="0 0 24 24">
                                            <path
                                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.588-7.52 2.588-.49 0-.974-.028-1.455-.086 2.679 1.743 5.87 2.77 9.282 2.77 11.217 0 17.583-9.302 17.583-17.585 0-.269-.006-.537-.017-.804.949-.684 1.77-1.536 2.423-2.502z">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="border-t border-accent/30 mt-8 pt-6 text-center text-sm text-primary-secondary dark:text-accent">
                            © 2024 Cookie Co. All rights reserved.
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>