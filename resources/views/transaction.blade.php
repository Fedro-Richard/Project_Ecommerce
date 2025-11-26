@extends('layouts.app', ['assets' => ['resources/css/transaction.css', 'resources/js/transaction.js']])

@section('title', 'Your Transactions - Cookie Co.')

@section('content')
<main class="flex-1">
    <div class="px-4 md:px-10 lg:px-20 xl:px-40 flex flex-1 justify-center py-5">
      <div class="layout-content-container flex flex-col max-w-[960px] flex-1">

        <div class="flex flex-wrap justify-between gap-3 p-4">
          <h1 class="text-brand-dark-coffee text-4xl font-black leading-tight tracking-[-0.033em] min-w-72">Your Transactions</h1>
        </div>

        <!-- Search -->
        <div class="px-4 py-3">
          <label class="flex flex-col min-w-40 h-12 w-full">
            <div class="flex w-full flex-1 items-stretch rounded-lg h-full">
              <div class="text-brand-tan flex border-none bg-white items-center justify-center pl-4 rounded-l-lg border-r-0">
                <span class="material-symbols-outlined">search</span>
              </div>
              <input
                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-brand-dark-coffee focus:outline-0 focus:ring-0 border-none bg-white focus:border-none h-full placeholder:text-brand-tan px-4 rounded-l-none border-l-0 pl-2 text-base font-normal leading-normal"
                placeholder="Search by Order ID"
                value=""
              />
            </div>
          </label>
        </div>

        <!-- Cards -->
        <div class="space-y-4">

          <!-- Card 1 -->
          <div class="p-4 @container">
            <div class="flex flex-col items-stretch justify-start rounded-xl @xl:flex-row @xl:items-start shadow-[0_2px_8px_rgba(84,51,16,0.1)] bg-white border border-brand-tan/30">
              <div
                class="w-full @xl:w-1/3 bg-center bg-no-repeat aspect-video @xl:aspect-square bg-cover rounded-t-xl @xl:rounded-l-xl @xl:rounded-r-none"
                data-alt="A delightful arrangement of freshly baked cookies including chocolate chip, oatmeal raisin, and snickerdoodle."
                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC5RhpejPLNFcyR9gyX882IHt9NaxlXOPdmJzngt8lO35D7YhNHOcLZ86W6HJ-OhT5OQ-ThGAx43Jrhv1wIjgDTHYon5UpZEKCmqm1RsYujxVyypSeDEvz1Nz4MBRuZuTiv7sPWS6O4wTo5mf64z4p80sb-vEC8MlXK8LRl9mqUo6h0v3LFablkIFMHCi2fIqAAPvULP1d1hzAO8yGVP20K_PrEQDYXKrRfYnJ5iLASLtF8nFpcgd0DsUtoD8VJBWNvHVUJ5kbrA0M');"
              ></div>
              <div class="flex w-full min-w-72 grow flex-col items-stretch justify-center gap-1 p-4">
                <p class="text-brand-tan text-sm font-normal leading-normal">Order #C123-4567 | Oct 26, 2023</p>
                <p class="text-brand-dark-coffee text-lg font-bold leading-tight tracking-[-0.015em]">Total: $24.50</p>
                <div class="flex flex-col sm:flex-row items-start sm:items-end gap-3 justify-between mt-2">
                  <p class="text-brand-medium-brown text-base font-normal leading-normal">
                    Chocolate Chip Cookie x2, Oatmeal Raisin Cookie x1, Snickerdoodle x3
                  </p>
                  <a href="/productdetail" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-8 px-4 bg-brand-medium-brown text-white text-sm font-medium leading-normal hover:bg-brand-dark-coffee transition-colors">
                    <span class="truncate">View Details</span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="p-4 @container">
            <div class="flex flex-col items-stretch justify-start rounded-xl @xl:flex-row @xl:items-start shadow-[0_2px_8px_rgba(84,51,16,0.1)] bg-white border border-brand-tan/30">
              <div
                class="w-full @xl:w-1/3 bg-center bg-no-repeat aspect-video @xl:aspect-square bg-cover rounded-t-xl @xl:rounded-l-xl @xl:rounded-r-none"
                data-alt="A stack of rich, double chocolate cookies with melted chocolate chips."
                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCFYXCDluSChtbCgne6tlyM3GZ-YSzhN0rkOBJMbU8Te0eoNAI2Tt1pOttRGaW87Q2-Bc_RFQt_dVqt5Fvmr0Pw6y56gHeiJjKXuKaH6yeLD-vIZVnDa0IYr-RUxU7yYuVRyZ2uDJI4S-Wew8L41I-mjGLuodHxWSgDKreecmpPr7pW0r4mgBmigAL0HwMpo8CHjR1-AuWTa9iYVqfT6r6Q5LuzyyC7jLupj1DkJHOiKnDWgVahJSVy0GGTjSq1SzgTmYx_Bi45EwU');"
              ></div>
              <div class="flex w-full min-w-72 grow flex-col items-stretch justify-center gap-1 p-4">
                <p class="text-brand-tan text-sm font-normal leading-normal">Order #C123-4498 | Oct 15, 2023</p>
                <p class="text-brand-dark-coffee text-lg font-bold leading-tight tracking-[-0.015em]">Total: $18.00</p>
                <div class="flex flex-col sm:flex-row items-start sm:items-end gap-3 justify-between mt-2">
                  <p class="text-brand-medium-brown text-base font-normal leading-normal">Double Chocolate Cookie x4</p>
                  <a href="/productdetail" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-8 px-4 bg-brand-medium-brown text-white text-sm font-medium leading-normal hover:bg-brand-dark-coffee transition-colors">
                    <span class="truncate">View Details</span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="p-4 @container">
            <div class="flex flex-col items-stretch justify-start rounded-xl @xl:flex-row @xl:items-start shadow-[0_2px_8px_rgba(84,51,16,0.1)] bg-white border border-brand-tan/30">
              <div
                class="w-full @xl:w-1/3 bg-center bg-no-repeat aspect-video @xl:aspect-square bg-cover rounded-t-xl @xl:rounded-l-xl @xl:rounded-r-none"
                data-alt="A single, perfectly baked peanut butter cookie on a white plate."
                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBaFUz52ZTpM1rMo7VRROcYRruZPd6cW4uwuKD9DiGyn7MSPiDc-DmgqVBpdtJNGc9Q5TC3EvxCMlgknaRrz6hmySl9FoQgJYLTS8KyuOQGkGbV6TFVvMulUbhS9TRTB3xK51gofgJXuqw4jU2htmT6XCLODpy1evRTFjnDilZ-eG6ZBiAVF8NZzprq1jZ__Hl3iLoIL1TLo0qPGEuHIb1pleYTmmCh1QWEymxXgcWuvYcnrsdLMQz8op8qYFCGBgLeMBwxAtGxAUA');"
              ></div>
              <div class="flex w-full min-w-72 grow flex-col items-stretch justify-center gap-1 p-4">
                <p class="text-brand-tan text-sm font-normal leading-normal">Order #C123-4312 | Sep 28, 2023</p>
                <p class="text-brand-dark-coffee text-lg font-bold leading-tight tracking-[-0.015em]">Total: $9.75</p>
                <div class="flex flex-col sm:flex-row items-start sm:items-end gap-3 justify-between mt-2">
                  <p class="text-brand-medium-brown text-base font-normal leading-normal">Peanut Butter Cookie x3</p>
                  <a href="/productdetail" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-8 px-4 bg-brand-medium-brown text-white text-sm font-medium leading-normal hover:bg-brand-dark-coffee transition-colors">
                    <span class="truncate">View Details</span>
                  </a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
</main>
@endsection
