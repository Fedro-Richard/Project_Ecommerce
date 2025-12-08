@extends('layouts.app')

@section('title', 'Login - Florenoria')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-16 px-4 bg-[#fdfbf7]">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 border border-[#e8dccb]">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="font-serif text-3xl text-[#5e4033] mb-2">Welcome Back</h1>
            <p class="text-[#8b5e3c] text-sm">Please sign in to continue</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-800 rounded-lg p-4 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            
            <!-- Email -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-[#5e4033] mb-2">Email Address</label>
                <input type="email" name="email" id="email" 
                    class="w-full px-4 py-3 rounded-lg border border-[#e8dccb] focus:border-[#dfa878] focus:ring-2 focus:ring-[#dfa878]/20 outline-none transition-colors text-[#5e4033] placeholder-[#b8a696]"
                    placeholder="name@example.com"
                    value="{{ old('email') }}"
                    required autofocus>
            </div>

            <!-- Password -->
            <div class="mb-8">
                <label for="password" class="block text-sm font-medium text-[#5e4033] mb-2">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full px-4 py-3 rounded-lg border border-[#e8dccb] focus:border-[#dfa878] focus:ring-2 focus:ring-[#dfa878]/20 outline-none transition-colors text-[#5e4033] placeholder-[#b8a696]"
                    placeholder="••••••••"
                    required>
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                class="w-full py-3 px-4 bg-[#8b5e3c] hover:bg-[#6d4a2f] text-white font-medium rounded-full shadow-md hover:shadow-lg transform transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#8b5e3c]">
                Sign In
            </button>
        </form>
        
        <div class="mt-8 text-center">
            <a href="{{ route('home') }}" class="text-xs text-[#8b5e3c] hover:text-[#5e4033] transition-colors">
                &larr; Back to Home
            </a>
        </div>
    </div>
</div>
@endsection
