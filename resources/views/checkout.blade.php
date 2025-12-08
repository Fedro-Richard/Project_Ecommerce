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

    <div class="cart-layout" style="display: flex; flex-direction: column; align-items: center; gap: 50px;">

        {{-- KOLOM ATAS: SUMMARY (Moved from right) --}}
        <aside class="cart-summary" style="width: 100%; max-width: 800px;">
            <div class="summary-card">
                <h2 class="summary-title">Order Summary</h2>

                <div class="order-items" style="max-height: 300px; overflow-y: auto; margin-bottom: 20px;">
                    @foreach($cart as $item)
                        <div class="summary-item" style="display: flex; justify-content: space-between; align-items: flex-start; gap: 20px; margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                            <div>
                                <div style="font-weight: 600; color: #592203;">{{ $item['name'] }}</div>
                                <div style="font-size: 0.9rem; color: #666;">x{{ $item['quantity'] }}</div>
                            </div>
                            <div style="font-weight: 600; color: #592203;">
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

        {{-- KOLOM BAWAH: FORM DATA PEMBELI (Moved from left) --}}
        <div class="checkout-form-container" style="width: 100%; max-width: 800px;">
            <form action="{{ route('checkout.process') }}" method="POST" enctype="multipart/form-data" id="checkout-form">
                @csrf
                
                <h2 style="font-size: 1.5rem; margin-bottom: 20px; border-bottom: 2px solid #eee; padding-bottom: 10px;">
                    Shipping Details
                </h2>

                <div class="form-group" style="margin-bottom: 30px;">
                    <label for="name" style="display: block; margin-bottom: 10px; font-weight: 500; font-size: 1.2rem;">Full Name</label>
                    <input type="text" name="name" id="name" required 
                        value="{{ old('name', Auth::user()->name ?? '') }}"
                        style="width: 100%; padding: 16px; border: 1px solid #ccc; border-radius: 8px; font-size: 1.1rem;">
                    @error('name') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
                </div>

                <div class="form-group" style="margin-bottom: 30px;">
                    <label for="phone" style="display: block; margin-bottom: 10px; font-weight: 500; font-size: 1.2rem;">Phone Number</label>
                    <input type="text" name="phone" id="phone" required 
                        value="{{ old('phone', Auth::user()->phone_number ?? '') }}"
                        style="width: 100%; padding: 16px; border: 1px solid #ccc; border-radius: 8px; font-size: 1.1rem;">
                    @error('phone') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
                </div>

                <div class="form-group" style="margin-bottom: 30px;">
                    <label for="address" style="display: block; margin-bottom: 10px; font-weight: 500; font-size: 1.2rem;">Full Address</label>
                    <textarea name="address" id="address" rows="4" required 
                        style="width: 100%; padding: 16px; border: 1px solid #ccc; border-radius: 8px; font-size: 1.1rem;">{{ old('address', Auth::user()->address ?? '') }}</textarea>
                    @error('address') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
                </div>

                <h2 style="font-size: 1.5rem; margin-bottom: 20px; border-bottom: 2px solid #eee; padding-bottom: 10px;">
                    Payment Method
                </h2>

                <div class="payment-methods" style="margin-bottom: 30px;">
                    <label style="display: block; margin-bottom: 15px; cursor: pointer; font-size: 1.1rem;">
                        <input type="radio" name="payment_method" value="COD" {{ old('payment_method') == 'COD' ? 'checked' : '' }} onchange="toggleQris(false)" required style="transform: scale(1.2);">
                        <span style="font-weight: bold; margin-left: 10px;">COD (Cash on Delivery)</span>
                    </label>
                    
                    <label style="display: block; margin-bottom: 15px; cursor: pointer; font-size: 1.1rem;">
                        <input type="radio" name="payment_method" value="QRIS" {{ old('payment_method') == 'QRIS' ? 'checked' : '' }} onchange="toggleQris(true)" required style="transform: scale(1.2);">
                        <span style="font-weight: bold; margin-left: 10px;">QRIS (Dana/OVO/GoPay)</span>
                    </label>
                </div>

                {{-- QRIS Section (Hidden by default) --}}
                <div id="qris-section" style="display: none; background: #f9f9f9; padding: 25px; border-radius: 10px; border: 1px solid #ddd; margin-bottom: 30px; text-align: center;">
                    <p style="margin-bottom: 20px; font-weight: 500; font-size: 1.1rem;">Scan QR Code to Pay:</p>
                    <img src="{{ asset('images/WhatsApp Image 2025-12-04 at 15.00.41_f394179e.jpg') }}" alt="QRIS Code" style="max-width: 250px; border-radius: 10px; margin-bottom: 15px;">
                    
                    <div class="form-group" style="text-align: left;">
                        <label for="payment_proof" style="display: block; margin-bottom: 10px; font-weight: 500; font-size: 1.1rem;">Upload Payment Proof <span style="color: red">*</span></label>
                        <input type="file" name="payment_proof" id="payment_proof" accept="image/*"
                            style="width: 100%; padding: 16px; background: white; border: 1px solid #ccc; border-radius: 8px;">
                        <span style="font-size: 0.9rem; color: #666; display: block; margin-top: 5px;">*Max file size: 2MB</span>
                        @error('payment_proof') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
                    </div>
                </div>

                <button type="submit" class="checkout-button" style="width: 100%; padding: 20px; background: #2c2c2c; color: white; border: none; font-size: 1.25rem; font-weight: bold; cursor: pointer; border-radius: 8px; transition: background 0.3s;">
                    Complete Order
                </button>

            </form>
        </div>

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
