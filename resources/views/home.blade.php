@extends('layouts.app', ['assets' => ['resources/css/home.css', 'resources/js/home.js']])

@section('title', 'Cookie Co. - Freshly Baked Artisanal Cookies')

@section('content')
<html>
    
<body>
<main>
 
    {{-- HERO SECTION --}}
    <div class="home-hero-wrapper">
        <div class="layout-content-container home-hero-layout">
            <div class="home-hero-container">
                <div class="home-hero-inner">
                    <div class="hero-section home-hero-card"
                        data-alt="A delicious spread of freshly baked cookies on a rustic wooden table">
                        <div class="home-hero-text-group">
                            <h1 class="home-hero-title">
                                Freshly Baked Artisanal Cookies
                            </h1>
                            <h2 class="home-hero-subtitle">
                                Made with love and the finest ingredients, delivered warm to your door.
                            </h2>
                        </div>
                        <a href="{{ url('/shop') }}" class="home-hero-button">
                            <span class="home-truncate">Shop All Cookies</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SECTION HEADER FEATURED --}}
    <div class="home-feature-header-wrapper">
        <div class="layout-content-container home-feature-header-layout">
            <h2 class="home-section-title">
                Our Featured Cookies
            </h2>
        </div>
    </div>

    {{-- IMAGE GRID FEATURED --}}
    <div class="home-feature-grid-wrapper">
        <div class="layout-content-container home-feature-grid-layout">
            <div class="home-feature-grid">
                {{-- Card 1 --}}
                <div class="home-cookie-card">
                    <div class="home-cookie-image-wrapper">
                        <div class="home-cookie-image-inner cookie-img-1"
                             data-alt="A classic chocolate chip cookie with large chunks of chocolate"></div>
                    </div>
                    <div class="home-cookie-textblock">
                        <p class="home-cookie-name">
                            Chocolate Chunk Classic
                        </p>
                        <p class="home-cookie-desc">
                            The timeless favorite, packed with rich chocolate chunks.
                        </p>
                        <p class="home-cookie-price">
                            $3.50
                        </p>
                    </div>

                    {{-- Add to Cart Card 1 --}}
                    <form action="{{ route('cart.add', 1) }}" method="POST">
                        @csrf
                        <button type="submit" class="home-cookie-button-secondary">
                            <span class="home-truncate">Add to Cart</span>
                        </button>
                    </form>
                </div>

                {{-- Card 2 --}}
                <div class="home-cookie-card">
                    <div class="home-cookie-image-wrapper">
                        <div class="home-cookie-image-inner cookie-img-2"
                             data-alt="An oatmeal raisin cookie with visible spices"></div>
                    </div>
                    <div class="home-cookie-textblock">
                        <p class="home-cookie-name">
                            Oatmeal Raisin Spice
                        </p>
                        <p class="home-cookie-desc">
                            A warm and comforting classic with a hint of cinnamon.
                        </p>
                        <p class="home-cookie-price">
                            $3.50
                        </p>
                    </div>

                    {{-- Add to Cart Card 2 --}}
                    <form action="{{ route('cart.add', 2) }}" method="POST">
                        @csrf
                        <button type="submit" class="home-cookie-button-secondary">
                            <span class="home-truncate">Add to Cart</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- ABOUT US SECTION --}}
    <div class="home-about-wrapper">
        <div class="layout-content-container home-about-card">
            <div class="home-about-grid">
                <div class="home-about-image about-us-img"
                    data-alt="A warm, inviting image of the Cookie Co. bakery kitchen"></div>
                <div class="home-about-textcol">
                    <h2 class="home-about-title">
                        Our Story
                    </h2>
                    <p class="home-about-description">
                        It all started in a small kitchen with a big dream: to create the perfect cookie. At
                        Cookie Co., we believe that the best treats are made with passion and the finest
                        ingredients. Every cookie is a piece of our heart, baked from scratch daily to bring
                        a moment of joy to your day. We're more than just a bakery; we're a community of
                        cookie lovers sharing a sweet tradition.
                    </p>
                    <a href="{{ url('/about') }}" class="home-about-button">
                        <span class="home-truncate">Learn More</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- REVIEW SECTION --}}
    <div class="home-review-wrapper">
        <div class="layout-content-container home-review-layout">

            {{-- Header --}}
            <div class="home-review-header">
                <h2 class="home-review-title">
                    What Our Customers Say
                </h2>
                <p class="home-review-subtitle">
                    Hear from our happy customers and share your own sweet experience with our cookies.
                </p>
            </div>

            {{-- Review cards --}}
            <div class="home-review-grid">
                {{-- Review 1 --}}
                <div class="home-review-card">
                    <div class="home-review-profile-row">
                        <div class="home-review-avatar"
                             style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA1swAOYA_AMfQJ7bvDXlOhKq_NjhAntAT74t-QvLpU0boL7U1aaqg8TydovuhIip4KTylKc2QNK6qRt4sDjIhPGdCegriQQykYu4djHRKPrZqPm3wSAHMM-3De6N5gW6vHQeOyn09HixWaz-a-i6HJ67OYVWD77Z1qovCAh5FCDQ-auR0QA0U630gnvobAG2J6566HWq_VdriW3JZ2F2dhUYMkD8SdCCRJhrcsOmfgWXid0hMBhkafCGJryNEpYJl3aSx8YDP7pAs");'>
                        </div>
                        <div class="home-review-profile-text">
                            <p class="home-review-name">Sarah J.</p>
                            <div class="home-review-stars">
                                <span class="material-symbols-outlined home-review-star-filled">star</span>
                                <span class="material-symbols-outlined home-review-star-filled">star</span>
                                <span class="material-symbols-outlined home-review-star-filled">star</span>
                                <span class="material-symbols-outlined home-review-star-filled">star</span>
                                <span class="material-symbols-outlined home-review-star-filled">star</span>
                            </div>
                        </div>
                    </div>
                    <p class="home-review-text">
                        "Absolutely the best cookies I've ever had! The Chocolate Chunk Classic is a dream.
                        They arrived warm and gooey, just like they promised. Will be ordering again... and again!"
                    </p>
                </div>

                {{-- Review 2 --}}
                <div class="home-review-card">
                    <div class="home-review-profile-row">
                        <div class="home-review-avatar"
                             style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAmdjwb2xpQwrAMkw-3QHytAXOs21chuW1jna_aRwHa1XZc2xCrjiAfOYoX23rb2YItYsMtWSHEUIaMpYIKs2vwvhsObqOwJxtM1fDKVJjUnYmCeu1eyZQVvlG3zu0YBB_iFf20syJq2BM3aDXXJTfgUtA5cusNB2VZIcR-X_6DyE7GplLrJCfqp0zSH5BmGcSES5ZABrgCJ_E-pv_7-CPJE_6pJDCnYt1uqmQqz3FtkvmyTHTPQTNjYBFBRCxuMGcrXZQ_-QdbvUE");'>
                        </div>
                        <div class="home-review-profile-text">
                            <p class="home-review-name">Mike R.</p>
                            <div class="home-review-stars">
                                <span class="material-symbols-outlined home-review-star-filled">star</span>
                                <span class="material-symbols-outlined home-review-star-filled">star</span>
                                <span class="material-symbols-outlined home-review-star-filled">star</span>
                                <span class="material-symbols-outlined home-review-star-filled">star</span>
                                <span class="material-symbols-outlined home-review-star-filled">star</span>
                            </div>
                        </div>
                    </div>
                    <p class="home-review-text">
                        "The Oatmeal Raisin Spice cookies remind me of my grandma's baking. Perfectly spiced and chewy.
                        The delivery was fast and the packaging was lovely. Highly recommend!"
                    </p>
                </div>

                {{-- Review 3 --}}
                <div class="home-review-card">
                    <div class="home-review-profile-row">
                        <div class="home-review-avatar"
                             style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAmdjwb2xpQwrAMkw-3QHytAXOs21chuW1jna_aRwHa1XZc2xCrjiAfOYoX23rb2YItYsMtWSHEUIaMpYIKs2vwvhsObqOwJxtM1fDKVJjUnYmCeu1eyZQVvlG3zu0YBB_iFf20syJq2BM3aDXXJTfgUtA5cusNB2VZIcR-X_6DyE7GplLrJCfqp0zSH5BmGcSES5ZABrgCJ_E-pv_7-CPJE_6pJDCnYt1uqmQqz3FtkvmyTHTPQTNjYBFBRCxuMGcrXZQ_-QdbvUE");'>
                        </div>
                        <div class="home-review-profile-text">
                            <p class="home-review-name">Emily C.</p>
                            <div class="home-review-stars">
                                <span class="material-symbols-outlined home-review-star-filled">star</span>
                                <span class="material-symbols-outlined home-review-star-filled">star</span>
                                <span class="material-symbols-outlined home-review-star-filled">star</span>
                                <span class="material-symbols-outlined home-review-star-filled">star</span>
                                <span class="material-symbols-outlined home-review-star-outline">star</span>
                            </div>
                        </div>
                    </div>
                    <p class="home-review-text">
                        "I ordered a mixed box for a party and they were a huge hit. The White Chocolate Macadamia
                        was my personal favorite. Great quality and fantastic customer service."
                    </p>
                </div>
            </div>

            {{-- Review form --}}
            <div class="home-review-form-card">
                <h3 class="home-review-form-title">
                    Leave Your Own Review
                </h3>
                <form class="home-review-form">
                    <div class="home-review-form-row">
                        <input type="text" class="home-review-input" placeholder="Your Name">
                        <input type="email" class="home-review-input" placeholder="Your Email">
                    </div>
                    <div class="home-review-form-row-single">
                        <textarea class="home-review-textarea" rows="4" placeholder="Your Review..."></textarea>
                    </div>
                    <div class="home-review-form-footer">
                        <div class="home-review-rating">
                            <span class="home-review-rating-label">Your Rating:</span>
                            <div class="home-review-rating-stars">
                                <span class="material-symbols-outlined home-review-star-interactive">star</span>
                                <span class="material-symbols-outlined home-review-star-interactive">star</span>
                                <span class="material-symbols-outlined home-review-star-interactive">star</span>
                                <span class="material-symbols-outlined home-review-star-interactive">star</span>
                                <span class="material-symbols-outlined home-review-star-interactive">star</span>
                            </div>
                        </div>
                        <button type="submit" class="home-review-submit-button">
                            <span class="home-truncate">Submit Review</span>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</main>
@include('bot')
    </body>
</html>
@endsection
