@extends('layouts.app', ['assets' => ['resources/css/cart.css']])

@section('title', 'Your Cart - Cookie Co.')

@section('content')
<div class="cart-page">

    {{-- HEADER TITLE --}}
    <div class="cart-header">
        <h1 class="cart-title">Shopping Cart</h1>
    </div>

    @if(!empty($cart))
        <div class="cart-layout">

            {{-- KOLOM KIRI: LIST ITEM --}}
            <div class="cart-items">
                @foreach($cart as $id => $details)
                    <div class="cart-item" data-id="{{ $id }}">

                        {{-- Gambar pakai CSS seperti shop --}}
                        <div class="cart-item-image cart-item-image-{{ $loop->iteration }}"></div>

                        <div class="cart-item-info">
                            <h3 class="cart-item-name">{{ $details['name'] }}</h3>
                            <p class="cart-item-price-single">
                                Price: Rp {{ number_format($details['price'], 0, ',', '.') }}
                            </p>
                        </div>

                        <div class="cart-item-qty">
                            <button class="qty-btn" data-action="minus">
                                <span class="material-symbols-outlined">remove</span>
                            </button>
                            <span class="qty-val">{{ $details['quantity'] }}</span>
                            <button class="qty-btn" data-action="plus">
                                <span class="material-symbols-outlined">add</span>
                            </button>
                        </div>

                        <div class="cart-item-total">
                            Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}
                        </div>

                        <button class="remove-btn">
                            <span class="material-symbols-outlined">delete</span>
                        </button>
                    </div>
                @endforeach
            </div>

            {{-- KOLOM KANAN: SUMMARY --}}
            <aside class="cart-summary">
                <div class="summary-card">
                    <h2 class="summary-title">Order Summary</h2>

                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span id="cart-subtotal">
                            Rp {{ number_format($subtotal, 0, ',', '.') }}
                        </span>
                    </div>

                    <div class="summary-row summary-row-spaced">
                        <span>Shipping</span>
                        <span class="summary-note" id="cart-shipping">
                            FREE
                        </span>
                    </div>

                    <hr class="summary-divider">

                    <div class="summary-row summary-total-row">
                        <span>Total</span>
                        <span class="summary-total-amount" id="cart-total">
                            Rp {{ number_format($total, 0, ',', '.') }}
                        </span>
                    </div>

                    <a href="{{ route('checkout.index') }}" class="checkout-button" style="display:block; text-align:center; text-decoration:none;">Checkout</a>
                    <p class="summary-secure-text">Secure Checkout Process</p>
                </div>
            </aside>

        </div>

        {{-- Continue Shopping --}}
        <div class="cart-continue">
            <a href="{{ route('shop.index') }}" class="cart-continue-link">
                Continue Shopping
            </a>
        </div>

    @else
        {{-- STATE KOSONG --}}
        <div class="cart-empty">
            <span class="material-symbols-outlined cart-empty-icon">
                shopping_cart_off
            </span>
            <h3 class="cart-empty-title">Your cart is empty</h3>
            <p class="cart-empty-text">Looks like you haven't added any sweets yet.</p>
            <a href="{{ route('shop.index') }}" class="cart-empty-button">Start Shopping</a>
        </div>
    @endif
</div>

@include('bot')

{{-- SCRIPT UNTUK TOMBOL + / - DAN HAPUS --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    const csrfToken = '{{ csrf_token() }}';

    document.querySelectorAll('.cart-item').forEach((itemEl) => {
        const id = itemEl.dataset.id;
        const qtyValEl = itemEl.querySelector('.qty-val');
        const itemTotalEl = itemEl.querySelector('.cart-item-total');

        // plus / minus
        itemEl.querySelectorAll('.qty-btn').forEach((btn) => {
            btn.addEventListener('click', () => {
                const action = btn.getAttribute('data-action');
                let currentQty = parseInt(qtyValEl.textContent, 10) || 1;

                if (action === 'minus') {
                    if (currentQty <= 1) return; // tidak boleh kurang dari 1
                    currentQty -= 1;
                } else if (action === 'plus') {
                    currentQty += 1;
                }

                fetch(`{{ url('/cart/update') }}/${id}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ quantity: currentQty })
                })
                .then(response => response.json())
                .then(data => {
                    // pastikan server kirim key yang benar
                    if (!data || typeof data.item_total === 'undefined') {
                        console.error('Update response invalid:', data);
                        return;
                    }

                    // update qty
                    qtyValEl.textContent = currentQty;

                    // update total item
                    itemTotalEl.textContent = 'Rp ' + data.item_total;

                    // update subtotal & total summary
                    const subtotalEl = document.getElementById('cart-subtotal');
                    const totalEl = document.getElementById('cart-total');

                    if (subtotalEl && typeof data.subtotal !== 'undefined') {
                        subtotalEl.textContent = 'Rp ' + data.subtotal;
                    }
                    if (totalEl && typeof data.grand_total !== 'undefined') {
                        totalEl.textContent = 'Rp ' + data.grand_total;
                    }
                })
                .catch(err => {
                    console.error('Update error:', err);
                });
            });
        });

        // tombol hapus
        const removeBtn = itemEl.querySelector('.remove-btn');
        if (removeBtn) {
            removeBtn.addEventListener('click', () => {
                fetch(`{{ url('/cart/remove') }}/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    }
                })
                .then(() => {
                    window.location.reload();
                })
                .catch(err => console.error('Remove error:', err));
            });
        }
    });
});
</script>
@endsection
