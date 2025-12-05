@extends('layouts.app')

@section('title', 'Shop - Cookie Co.')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-[#4B3621]">Freshly Baked Cookies</h1>
        <p class="text-[#4B3621]/70 mt-2">Handcrafted with love and premium ingredients.</p>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach($products as $id => $details)
        <div class="group flex flex-col bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
            <div class="relative aspect-square overflow-hidden bg-gray-100">
                <img src="{{ $details['image'] }}" alt="{{ $details['name'] }}" class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500">
            </div>

            <div class="p-5 flex flex-col flex-grow">
                <h3 class="font-bold text-lg text-[#4B3621] leading-tight mb-2">{{ $details['name'] }}</h3>
                <p class="text-sm text-[#4B3621]/60 line-clamp-2 mb-4 flex-grow">{{ $details['description'] }}</p>
                
                <div class="mt-auto">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-lg font-bold text-[#4B3621]">${{ number_format($details['price'], 2) }}</span>
                    </div>
                    
                    <form action="{{ route('cart.add', $id) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full bg-[#D3Cbb8] hover:bg-[#c4bcab] text-[#4B3621] font-bold py-3 px-4 rounded-lg transition-colors flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
     @include('bot')
@endsection