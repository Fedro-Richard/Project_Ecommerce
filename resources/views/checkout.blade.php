@extends('layouts.app', ['assets' => ['resources/css/cart.css']])

@section('title', 'Checkout - Cookie Co.')

@section('content')
<div class="cart-page"> 
    {{-- Utilizing existing cart styles for layout consistency --}}
    
    <div class="cart-header">
        <h1 class="cart-title">Checkout</h1>
    </div>

    @if(session('error'))
        <div class="alert-error" style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px; text-align: center;">
            {{ session('error') }}
        </div>
    @endif

    <div class="cart-layout" style="display: flex; gap: 40px; align-items: flex-start;">

        {{-- KOLOM KIRI: FORM DATA PEMBELI --}}
        <div class="checkout-form-container" style="flex: 2;">
            <form action="{{ route('checkout.process') }}" method="POST" enctype="multipart/form-data" id="checkout-form">
                @csrf
                
                <h2 style="font-size: 1.5rem; margin-bottom: 20px; border-bottom: 2px solid #eee; padding-bottom: 10px;">
                    Shipping Details
                </h2>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label for="name" style="display: block; margin-bottom: 5px; font-weight: 500;">Full Name</label>
                    <input type="text" name="name" id="name" required 
                        value="{{ old('name', Auth::user()->name ?? '') }}"
                        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 1rem;">
                    @error('name') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label for="phone" style="display: block; margin-bottom: 5px; font-weight: 500;">Phone Number</label>
                    <input type="text" name="phone" id="phone" required 
                        value="{{ old('phone', Auth::user()->phone_number ?? '') }}"
                        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 1rem;">
                    @error('phone') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
                </div>

                <div class="form-group" style="margin-bottom: 25px;">
                    <label for="address" style="display: block; margin-bottom: 5px; font-weight: 500;">Full Address</label>
                    <textarea name="address" id="address" rows="4" required 
                        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 1rem;">{{ old('address', Auth::user()->address ?? '') }}</textarea>
                    @error('address') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
                </div>

                <h2 style="font-size: 1.5rem; margin-bottom: 20px; border-bottom: 2px solid #eee; padding-bottom: 10px;">
                    Payment Method
                </h2>

                <div class="payment-methods" style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 10px; cursor: pointer;">
                        <input type="radio" name="payment_method" value="COD" {{ old('payment_method') == 'COD' ? 'checked' : '' }} onchange="toggleQris(false)" required>
                        <span style="font-weight: bold; margin-left: 8px;">COD (Cash on Delivery)</span>
                    </label>
                    
                    <label style="display: block; margin-bottom: 10px; cursor: pointer;">
                        <input type="radio" name="payment_method" value="QRIS" {{ old('payment_method') == 'QRIS' ? 'checked' : '' }} onchange="toggleQris(true)" required>
                        <span style="font-weight: bold; margin-left: 8px;">QRIS (Dana/OVO/GoPay)</span>
                    </label>
                </div>

                {{-- QRIS Section (Hidden by default) --}}
                <div id="qris-section" style="display: none; background: #f9f9f9; padding: 20px; border-radius: 10px; border: 1px solid #ddd; margin-bottom: 20px; text-align: center;">
                    <p style="margin-bottom: 15px; font-weight: 500;">Scan QR Code to Pay:</p>
                    <img src="{{ asset('images/WhatsApp Image 2025-12-04 at 15.00.41_f394179e.jpg') }}" alt="QRIS Code" style="max-width: 200px; border-radius: 10px; margin-bottom: 15px;">
                    
                    <div class="form-group" style="text-align: left;">
                        <label for="payment_proof" style="display: block; margin-bottom: 5px; font-weight: 500;">Upload Payment Proof <span style="color: red">*</span></label>
                        <input type="file" name="payment_proof" id="payment_proof" accept="image/*"
                            style="width: 100%; padding: 10px; background: white; border: 1px solid #ccc; border-radius: 5px;">
                        <span style="font-size: 0.8rem; color: #666; display: block; margin-top: 5px;">*Max file size: 2MB</span>
                        @error('payment_proof') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
                    </div>
                </div>

                <button type="submit" class="checkout-button" style="width: 100%; padding: 15px; background: #2c2c2c; color: white; border: none; font-size: 1.1rem; font-weight: bold; cursor: pointer; border-radius: 5px; transition: background 0.3s;">
                    Complete Order
                </button>

            </form>
        </div>

        {{-- KOLOM KANAN: SUMMARY --}}
        <aside class="cart-summary" style="flex: 1;">
            <div class="summary-card">
                <h2 class="summary-title">Order Summary</h2>

                <div class="order-items" style="max-height: 300px; overflow-y: auto; margin-bottom: 20px;">
                    @foreach($cart as $item)
                        <div class="summary-item" style="display: flex; justify-content: space-between; margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                            <div>
                                <div style="font-weight: 600;">{{ $item['name'] }}</div>
                                <div style="font-size: 0.9rem; color: #666;">x{{ $item['quantity'] }}</div>
                            </div>
                            <div style="font-weight: 600;">
                                Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="summary-row">
                    <span>Subtotal</span>
                    <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                </div>

                <div class="summary-row summary-row-spaced">
                    <span>Shipping</span>
                    <span class="summary-note">FREE</span>
                </div>

                <hr class="summary-divider">

                <div class="summary-row summary-total-row">
                    <span>Total</span>
                    <span class="summary-total-amount">
                        Rp {{ number_format($total, 0, ',', '.') }}
                    </span>
                </div>
                
                <p class="summary-secure-text" style="margin-top: 20px; text-align: center;">Using Secure Checkout</p>
            </div>
        </aside>

    </div>
</div>

<script>
    function toggleQris(show) {
        const qrisSection = document.getElementById('qris-section');
        const proofInput = document.getElementById('payment_proof');
        
        if (show) {
            qrisSection.style.display = 'block';
            proofInput.setAttribute('required', 'required');
        } else {
            qrisSection.style.display = 'none';
            proofInput.removeAttribute('required');
        }
    }

    // Initialize state based on old input
    document.addEventListener("DOMContentLoaded", function() {
        const selectedMethod = document.querySelector('input[name="payment_method"]:checked');
        if (selectedMethod && selectedMethod.value === 'QRIS') {
            toggleQris(true);
        }
    });

    document.getElementById('checkout-form').addEventListener('submit', function(e) {
        // Double check validation before submit alert
        const form = this;
        if (!form.checkValidity()) {
             // Let browser handle validation required messages
             return; 
        }

        // alert('Order is being processed...'); // Optional: removed to rely on post-redirect alert
    });
</script>
@endsection
