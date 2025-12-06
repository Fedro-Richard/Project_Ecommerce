@extends('layouts.app', ['assets' => ['resources/css/shop.css']])

@section('title', 'Shop - Cookie Co.')

@section('content')
<main class="shop-page-wrapper">
    <div class="shop-page-inner">

        {{-- HEADER --}}
        <section class="shop-header">
            <h1 class="shop-title">Our Freshly Baked Cookies</h1>
            <p class="shop-subtitle">Handcrafted with love and premium ingredients.</p>
        </section>

        {{-- ALERT SUCCESS --}}
        @if(session('success'))
            <div class="shop-alert-success" role="alert">
                <span class="shop-alert-text">{{ session('success') }}</span>
            </div>
        @endif

        {{-- GRID PRODUK --}}
        {{-- GRID PRODUK --}}
        <section class="shop-products-section">
            <div class="shop-products-grid">
                @foreach(array_slice($products, 0, 2, true) as $id => $details)
                    <article class="shop-card">
                        <div class="shop-card-image-wrapper shop-card-image-{{ $loop->iteration }}">
                            <div class="shop-card-image"></div>
                        </div>
                        <div class="shop-card-body">
                            <h3 class="shop-card-title">{{ $details['name'] }}</h3>
                            <p class="shop-card-description">
                                {{ $details['description'] }}
                            </p>

                            <div class="shop-card-footer">
                                <span class="shop-card-price">
                                    ${{ number_format($details['price'], 2) }}
                                </span>
                            </div>

                            <form action="{{ route('cart.add', $id) }}" method="POST" class="shop-card-form">
                                @csrf
                                <button type="submit" class="shop-card-button">
                                    <span class="material-symbols-outlined shop-card-button-icon">add_shopping_cart</span>
                                    <span class="shop-card-button-label">Add to Cart</span>
                                </button>
                            </form>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>


        @include('bot')
    </div>
</main>
@endsection
