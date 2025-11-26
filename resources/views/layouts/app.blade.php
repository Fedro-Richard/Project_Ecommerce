<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'Cookie Co.')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&amp;family=Lora:ital,wght@0,400..700;1,400..700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    @vite($assets ?? [])
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
            
            @yield('content')

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