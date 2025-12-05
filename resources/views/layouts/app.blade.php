<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <!-- PENTING: CSRF Token untuk keamanan AJAX Request Laravel -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Cookie Co.')</title>
    
    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&amp;family=Lora:ital,wght@0,400..700;1,400..700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    
    <!-- jQuery (Dibutuhkan untuk AJAX Cart Logic) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @vite($assets ?? [])
</head>

<body class="bg-[#F7F4E9] text-[#4B3621] font-display flex flex-col min-h-screen">
    
    <!-- Wrapper Utama -->
    <div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
        
        <!-- Navbar -->
        <header class="sticky top-0 z-50 w-full bg-[#F7F4E9]/95 backdrop-blur-sm border-b border-[#E0DCCF] shadow-sm">
            <div class="px-4 lg:px-10 flex justify-center">
                <div class="flex items-center justify-between py-4 w-full max-w-7xl">
                    
                    <!-- Logo -->
                    <a href="{{ route('home') }}" class="flex items-center gap-3 hover:opacity-80 transition-opacity">
                        <div class="size-8 text-[#4B3621]">
                            <svg fill="currentColor" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24 45.8096C19.6865 45.8096 15.4698 44.5305 11.8832 42.134C8.29667 39.7376 5.50128 36.3314 3.85056 32.3462C2.19985 28.361 1.76794 23.9758 2.60947 19.7452C3.451 15.5145 5.52816 11.6284 8.57829 8.5783C11.6284 5.52817 15.5145 3.45101 19.7452 2.60948C23.9758 1.76795 28.361 2.19986 32.3462 3.85057C36.3314 5.50129 39.7376 8.29668 42.134 11.8833C44.5305 15.4698 45.8096 19.6865 45.8096 24L24 24L24 45.8096Z"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold leading-tight tracking-tight">Cookie Co.</h2>
                    </a>

                    <!-- Navigasi Menu (Sesuai Route di web.php) -->
                    <nav class="hidden md:flex items-center gap-8">
                        <a class="text-sm font-medium hover:text-[#D3Cbb8] transition-colors {{ Request::routeIs('home') ? 'font-bold underline' : '' }}" 
                           href="{{ route('home') }}">Home</a>
                        
                        <a class="text-sm font-medium hover:text-[#D3Cbb8] transition-colors {{ Request::routeIs('shop.index') ? 'font-bold underline' : '' }}" 
                           href="{{ route('shop.index') }}">Shop</a>
                        
                        <a class="text-sm font-medium hover:text-[#D3Cbb8] transition-colors {{ Request::routeIs('about') ? 'font-bold underline' : '' }}" 
                           href="{{ route('about') }}">About Us</a>
                        
                        
                    </nav>

                    <!-- Icon Cart & Profile -->
                    <div class="flex items-center gap-4">
                        <!-- Tombol Cart -->
                        <a href="{{ route('cart.index') }}" class="relative group p-2 rounded-lg hover:bg-black/5 transition-colors">
                            <span class="material-symbols-outlined text-2xl group-hover:scale-110 transition-transform">shopping_cart</span>
                            
                            <!-- Badge Jumlah Item (Merah) -->
                            @if(session('cart') && count(session('cart')) > 0)
                                <span id="header-cart-count" class="absolute top-0 right-0 bg-red-600 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full shadow-sm">
                                    {{ count(session('cart')) }}
                                </span>
                            @endif
                        </a>
                        
                       
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Konten Halaman (Shop, Cart, Home, dll akan masuk sini) -->
        <main class="flex-grow w-full max-w-7xl mx-auto px-4 lg:px-10 py-8">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-[#F7F4E9] border-t border-[#E0DCCF] mt-auto">
            <div class="px-4 py-10 flex flex-col items-center justify-center gap-4">
               <h3 class="font-bold text-lg">Cookie Co.</h3>
               <p class="text-sm text-[#4B3621]/70">Baking happiness, one cookie at a time.</p>
               <div class="text-xs text-[#4B3621]/50 mt-4">
                    © 2024 Cookie Co. All rights reserved.
               </div>
            </div>
        </footer>
    </div>

    <!-- SCRIPT AJAX KERANJANG -->
    <!-- Script ini menangani update (+/-) dan hapus barang tanpa reload halaman -->
    <script>
        $(document).ready(function() {
            
            // Setup CSRF Token untuk semua request AJAX
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // 1. Tombol Update Quantity (+ / -)
            $(".qty-btn").click(function (e) {
                e.preventDefault();
                
                let btn = $(this);
                // Cari elemen pembungkus terdekat (baris produk)
                let container = btn.closest(".cart-item-row"); 
                let id = container.data("id");
                let qtySpan = container.find(".qty-val");
                let currentQty = parseInt(qtySpan.text());
                let action = btn.data("action"); // data-action="plus" atau "minus"

                // Logika matematika sederhana
                if(action === "plus") {
                    currentQty++;
                } else if(action === "minus" && currentQty > 1) {
                    currentQty--;
                } else {
                    return; // Jangan lakukan apa-apa jika minus ditekan saat qty = 1
                }

                // Kirim Request ke Server (Laravel)
                $.ajax({
                    url: '{{ route('cart.update') }}', // Memanggil route name 'cart.update'
                    method: "PATCH",
                    data: {
                        id: id,
                        quantity: currentQty
                    },
                    success: function (response) {
                        // Jika sukses, update angka di layar
                        qtySpan.text(currentQty);
                        container.find(".item-total").text('$' + response.itemSubtotal);
                        $("#cart-grand-total").text('$' + response.total);
                    },
                    error: function(xhr) {
                        console.error("Error updating cart:", xhr.responseText);
                        alert("Terjadi kesalahan saat mengupdate keranjang.");
                    }
                });
            });

            // 2. Tombol Hapus (Remove)
            $(".remove-btn").click(function (e) {
                e.preventDefault();
                
                let btn = $(this);
                let container = btn.closest(".cart-item-row");
                let id = container.data("id");

                if(confirm("Yakin ingin menghapus item ini?")) {
                    $.ajax({
                        url: '{{ route('cart.remove') }}', // Memanggil route name 'cart.remove'
                        method: "DELETE",
                        data: {
                            id: id
                        },
                        success: function (response) {
                            // Hapus baris HTML dengan animasi fade out
                            container.fadeOut(300, function() { $(this).remove(); });
                            
                            // Update total harga
                            $("#cart-grand-total").text('$' + response.total);
                            
                            // Update badge merah di header
                            let badge = $("#header-cart-count");
                            let currentCount = parseInt(badge.text());
                            
                            if(currentCount > 1) {
                                badge.text(currentCount - 1);
                            } else {
                                // Jika item habis, reload halaman agar muncul pesan "Keranjang Kosong"
                                window.location.reload();
                            }
                        },
                        error: function(xhr) {
                            console.error("Error removing item:", xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>