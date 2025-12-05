@extends('layouts.app')

@section('title', 'Your Cart - Cookie Co.')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-[#4B3621]">Shopping Cart</h1>
        <a href="{{ route('shop.index') }}" class="text-sm font-medium text-[#4B3621]/60 hover:text-[#4B3621] underline">Continue Shopping</a>
    </div>

    @if(session('cart'))
        <div class="flex flex-col lg:flex-row gap-10">
            <div class="flex-grow space-y-6">
                @php $total = 0; @endphp
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    
                    <div class="cart-item-row flex gap-4 sm:gap-6 items-start pb-6 border-b border-[#E0DCCF]" data-id="{{ $id }}">
                        <div class="w-24 h-24 flex-shrink-0 bg-gray-100 rounded-lg overflow-hidden">
                            <img src="{{ $details['image'] }}" class="w-full h-full object-cover">
                        </div>

                        <div class="flex-grow">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-bold text-lg text-[#4B3621]">{{ $details['name'] }}</h3>
                                <p class="font-bold text-[#4B3621] item-total">${{ number_format($details['price'] * $details['quantity'], 2) }}</p>
                            </div>
                            <p class="text-sm text-[#4B3621]/60 mb-4">Price: ${{ number_format($details['price'], 2) }}</p>

                            <div class="flex justify-between items-center">
                                <div class="flex items-center border border-[#E0DCCF] rounded-full px-2 py-1">
                                    <button class="qty-btn w-8 h-8 flex items-center justify-center text-[#4B3621] hover:bg-black/5 rounded-full transition" data-action="minus">
                                        <span class="material-symbols-outlined text-sm">remove</span>
                                    </button>
                                    <span class="qty-val w-8 text-center font-medium">{{ $details['quantity'] }}</span>
                                    <button class="qty-btn w-8 h-8 flex items-center justify-center text-[#4B3621] hover:bg-black/5 rounded-full transition" data-action="plus">
                                        <span class="material-symbols-outlined text-sm">add</span>
                                    </button>
                                </div>

                                <button class="remove-btn text-sm text-red-500 hover:text-red-700 font-medium underline">
                                    Remove
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="w-full lg:w-80 flex-shrink-0">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-[#E0DCCF]">
                    <h2 class="text-lg font-bold mb-4">Order Summary</h2>
                    <div class="flex justify-between mb-2 text-[#4B3621]/70">
                        <span>Subtotal</span>
                        <span id="cart-grand-total">${{ number_format($total, 2) }}</span>
                    </div>
                    <div class="flex justify-between mb-6 text-[#4B3621]/70">
                        <span>Shipping</span>
                        <span>Calculated at checkout</span>
                    </div>
                    <hr class="border-[#E0DCCF] mb-6">
                    
                    <button class="w-full bg-[#4B3621] hover:bg-[#3a2a1a] text-white font-bold py-3.5 rounded-lg transition-colors mb-3">
                        Checkout
                    </button>
                    <p class="text-xs text-center text-[#4B3621]/50">Secure Checkout Process</p>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-20 bg-white rounded-xl border border-dashed border-[#E0DCCF]">
            <span class="material-symbols-outlined text-6xl text-[#4B3621]/20 mb-4">shopping_cart_off</span>
            <h3 class="text-xl font-bold text-[#4B3621] mb-2">Your cart is empty</h3>
            <p class="text-[#4B3621]/60 mb-6">Looks like you haven't added any sweets yet.</p>
            <a href="{{ route('shop.index') }}" class="inline-block bg-[#4B3621] text-white px-6 py-3 rounded-lg font-bold hover:bg-[#3a2a1a] transition-colors">
                Start Shopping
            </a>
        </div>
    @endif
</div>
 @include('bot')
@endsection