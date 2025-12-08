@extends('layouts.app')

@section('title', 'Page Not Found - Florenoria')

@section('content')
<div class="min-h-[60vh] flex flex-col items-center justify-center text-center px-4 py-16">
    <div class="mb-8">
        <span class="text-9xl font-serif text-[#dfa878] opacity-20 select-none">404</span>
    </div>
    
    <h1 class="font-serif text-4xl md:text-5xl text-[#5e4033] mb-4">
        Crumbs! We can't find that page.
    </h1>
    
    <p class="text-[#8b5e3c] text-lg max-w-md mx-auto mb-10 font-sans">
        It seems this page has been eaten or simply doesn't exist. 
        Don't worry, we have plenty more fresh cookies back home.
    </p>
    
    <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-8 py-3 text-base font-medium text-white transition-all duration-200 bg-[#8b5e3c] border border-transparent rounded-full hover:bg-[#6d4a2f] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#8b5e3c] shadow-md hover:shadow-lg">
        Return to Home
    </a>
</div>
@endsection
