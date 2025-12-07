<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <!-- PENTING: CSRF Token untuk keamanan AJAX Request Laravel -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Cookie Co.')</title>
    
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&amp;family=Lora:ital,wght@0,400..700;1,400..700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    
    <!-- jQuery (Dibutuhkan untuk AJAX Cart Logic) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- load CSS global + CSS/JS per-halaman --}}
    @vite(array_merge(['resources/css/app.css'], $assets ?? []))

</head>

{{-- teks dan background sekarang di-handle style.css (var(--bg-color), var(--text-color)) --}}
<body>
    
    <!-- Wrapper Utama -->
    <div class="app-shell">

        
        <!-- Navbar -->
        <header class="site-header">
            <div class="header-inner">
                
                <!-- Logo -->
                <a href="{{ route('home') }}" class="logo-link">
                    <img
                        src="{{ asset('images/florenoria.png') }}"
                        alt="Florenoria"
                        class="site-logo"
                    >
                </a>

                <!-- Navigasi Menu -->
                <nav class="site-nav">
                    <a
                        href="{{ route('home') }}"
                        class="site-nav-link {{ Request::routeIs('home') ? 'is-active' : '' }}"
                    >
                        Home
                    </a>
                    <a
                        href="{{ route('about') }}"
                        class="site-nav-link {{ Request::routeIs('about') ? 'is-active' : '' }}"
                    >
                        About Us
                    </a>
                    
                    <a
                        href="{{ route('shop.index') }}"
                        class="site-nav-link {{ Request::routeIs('shop.index') ? 'is-active' : '' }}"
                    >
                        Shop
                    </a>

                    
                </nav>

                <!-- Icon Cart -->
                <div class="header-actions">
                    <a href="{{ route('cart.index') }}" class="cart-link">
                        <span class="material-symbols-outlined">
                            shopping_cart
                        </span>

                        @if(session('cart') && count(session('cart')) > 0)
                            <span id="header-cart-count" class="absolute top-0 right-0 bg-red-600 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full shadow-sm">
                                {{ count(session('cart')) }}
                            </span>
                        @endif
                    </a>
                </div>
            </div>
        </header>

        
        <!-- Konten Halaman (Shop, Cart, Home, dll akan masuk sini) -->
        <main class="site-main">
            @yield('content')
        </main>


        <!-- Footer -->
        <footer class="site-footer">
            <div class="site-footer-inner">
               <h3 class="site-footer-title">Florenoria</h3>
               <p class="site-footer-text-muted">
                   Baking happiness, one tasty and healthy cookie at a time.
               </p>
               <div class="site-footer-copy">
                    © 2025 Florenoria. All rights reserved.
               </div>
            </div>
        </footer>

    </div>

    <!-- SCRIPT AJAX KERANJANG (tidak diubah kecuali URL) -->
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            
        });
    </script>
</body>
</html>
