@extends('layouts.app', ['assets' => ['resources/css/about.css', 'resources/js/about.js']])

@section('title', 'Cookie Co. - About Us')

@section('content')
<main class="about-main">
    <!-- HeroSection -->
    <div class="about-hero-section">
        <div class="about-hero-maxwidth">
            <div class="about-hero-container">
                <div class="about-hero-padding">
                    <div class="about-hero-card hero-bg"
                        data-alt="A warm, inviting shot of freshly baked cookies on a rustic wooden table.">
                        <div class="about-hero-textgroup">
                            <h1 class="font-serif about-hero-title">
                                Baked with Love, From Our Kitchen to Yours.
                            </h1>
                            <h2 class="about-hero-subtitle">
                                Discover the story behind our irresistibly delicious, handcrafted cookies.
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FeatureSection (Brand Story) -->
    <div class="about-story-section">
        <div class="about-story-maxwidth">
            <div class="about-story-grid">
                <div class="about-story-image story-img"
                    data-alt="A baker's hands kneading dough on a floured surface."></div>
                <div class="about-story-textcol">
                    <h2 class="font-serif about-story-title">
                        How It All Began
                    </h2>
                    <p class="about-story-paragraph">
                        Our journey started in a small home kitchen with a passion for creating the perfect
                        cookie. We believe in using only the finest, all-natural ingredients to bake treats
                        that bring joy and comfort to every bite. What began as a simple hobby has blossomed
                        into a beloved brand, but our core values remain the same: quality, community, and
                        the simple happiness found in a perfectly baked cookie.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Mission/Values Section -->
    <div class="about-mission-section">
        <div class="about-mission-inner">
            <div class="about-mission-content">
                <div class="about-mission-icon-wrapper">
                    <span class="material-symbols-outlined favorite-icon about-icon-large">favorite</span>
                </div>
                <h2 class="font-serif about-mission-title">
                    Our Promise To You
                </h2>
                <p class="about-mission-paragraph">
                    At Cookie Co., we're committed to more than just baking. We promise to use only the
                    highest quality, ethically sourced ingredients. We promise that every cookie is baked
                    fresh with care and attention to detail. Most importantly, we promise to deliver a
                    moment of pure delight with every order, ensuring your satisfaction from the first click
                    to the last crumb.
                </p>
            </div>
        </div>
    </div>

    <!-- Image Gallery -->
    <div class="about-gallery-section">
        <div class="about-gallery-maxwidth">
            <div class="about-gallery-inner">
                <h2 class="font-serif about-gallery-title">
                    The Art of the Cookie
                </h2>
                <div class="about-gallery-grid">
                    <div class="about-gallery-card">
                        <div class="about-gallery-image gallery-img-1"
                            data-alt="Close-up of high-quality chocolate chips in a bowl."></div>
                    </div>
                    <div class="about-gallery-card">
                        <div class="about-gallery-image gallery-img-2"
                            data-alt="A team of bakers smiling and working together in a kitchen."></div>
                    </div>
                    <div class="about-gallery-card">
                        <div class="about-gallery-image gallery-img-3"
                            data-alt="A row of perfectly shaped cookie dough balls on a baking sheet."></div>
                    </div>
                    <div class="about-gallery-card">
                        <div class="about-gallery-image gallery-img-4"
                            data-alt="Golden-brown cookies cooling on a wire rack."></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Social Media Section -->
    <div class="about-social-section">
        <div class="about-social-maxwidth">
            <div class="about-social-card">
                <h3 class="font-serif about-social-title">
                    Join Our Sweet Community
                </h3>
                <p class="about-social-paragraph">
                    Follow our journey on social media for behind-the-scenes peeks, new flavor announcements,
                    and special offers!
                </p>
                <div class="about-social-icons">
                    <a aria-label="Instagram" href="https://www.instagram.com/florenoriaa/" class="about-social-icon-link">
                        <svg aria-hidden="true" class="about-social-icon" fill="currentColor" viewBox="0 0 24 24">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 012.792 2.792c.247.636.416 1.363.465 2.427.048 1.024.06 1.378.06 3.808s-.012 2.784-.06 3.808c-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-2.792 2.792c-.636.247-1.363.416-2.427.465-1.024.048-1.378.06-3.808.06s-2.784-.013-3.808-.06c-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-2.792-2.792c-.247-.636-.416-1.363-.465-2.427-.048-1.024-.06-1.378-.06-3.808s.012-2.784.06-3.808c.049-1.064.218-1.791.465-2.427a4.902 4.902 0 012.792-2.792c.636-.247 1.363-.416 2.427-.465C9.53 2.013 9.884 2 12.315 2zM12 7a5 5 0 100 10 5 5 0 000-10zm0-2a7 7 0 110 14 7 7 0 010-14zm6.406-2.31a1.25 1.25 0 100 2.5 1.25 1.25 0 000-2.5z">
                            </path>
                        </svg>
                    </a>
                    <a aria-label="Facebook" href="#" class="about-social-icon-link">
                        <svg aria-hidden="true" class="about-social-icon" fill="currentColor" viewBox="0 0 24 24">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z">
                            </path>
                        </svg>
                    </a>
                    <a aria-label="TikTok" href="#" class="about-social-icon-link">
                        <svg aria-hidden="true" class="about-social-icon" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-2.43.05-4.86-.95-6.43-2.88-1.57-1.93-2.2-4.38-1.92-6.84.28-2.46 1.53-4.66 3.46-6.11 2.05-1.55 4.54-2.22 7.01-1.74.12 2.05.11 4.1-.03 6.13-.24.33-.5.64-.78.93-.46.46-1.02.82-1.62 1.05-1.06.41-2.22.54-3.36.31v-4.71c.14-.02.28-.04.42-.06 1.06-.14 2.06-.52 2.95-1.15.54-.38 1-1.03 1.2-1.74.17-.59.25-1.21.24-1.84h4.03Z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('bot')
</main>
@endsection
