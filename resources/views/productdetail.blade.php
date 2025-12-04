
<!DOCTYPE html>
<html class="light" lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Cookie Co. - The Ultimate Chocolate Chip Cookie</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Nunito+Sans:wght@400;600;700&display=swap"
    rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    rel="stylesheet" />
   @vite(['resources/css/app.css', 'resources/css/productdetail.css','resources/js/productdetail.js'])

@extends('layouts.app', ['assets' => ['resources/css/home.css', 'resources/js/home.js']])

@section('title', 'Cookie Co. - Freshly Baked Artisanal Cookies')

@section('content')
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-secondary dark:text-tertiary">
  <div class="relative flex min-h-screen w-full flex-col group/design-root overflow-x-hidden">
    <div class="layout-container flex h-full grow flex-col">

      

      <!-- Main content -->
      <main class="container mx-auto flex-1 px-4 pt-10 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-8 mt-4">
          <!-- Breadcrumb -->
          <div class="flex flex-wrap gap-2">
            <a class="text-sm font-medium leading-normal text-tertiary hover:text-primary" href="#">Shop</a>
            <span class="text-sm font-medium leading-normal text-tertiary">/</span>
            <a class="text-sm font-medium leading-normal text-tertiary hover:text-primary" href="#">Classic Cookies</a>
            <span class="text-sm font-medium leading-normal text-tertiary">/</span>
            <span class="text-sm font-medium leading-normal text-secondary dark:text-tertiary">Chocolate Chip
              Cookie</span>
          </div>

          <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:gap-12">
            <!-- Left: Images -->
            <div class="w-full">
              <div class="aspect-square w-full overflow-hidden rounded-xl bg-gray-200">
                <div class="h-full w-full bg-cover bg-center"
                  data-alt="A large, perfectly baked chocolate chip cookie with melting chocolate chunks, resting on a rustic wooden surface."
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBkh28AJ-DF4L40GxIxu692s9QhTeiS8vMafmrlbkIxueBFioIYlHErnPc-71lAQcTAOv1V3f18SQiBOM99XIlcD9YftYbNLV_GPY4mtrRJ0tUrelBaK_MqXEbqtGuJhb5f1anDVdVqvq7kHyRRcdanyvDbYo94v1jyxYgO7Z5Oaq0Jn_7Y54hk4s09H2axnQ1ig-OAFUEfxev5eLefGT044bDyvJh9bSBKpJH8Ed43bVJExYlm9ACiP1yh8Yor6UfsWn4Pfu91v8c");'>
                </div>
              </div>
              <div class="mt-4 grid grid-cols-4 gap-4">
                <div
                  class="aspect-square w-full cursor-pointer overflow-hidden rounded-lg border-2 border-primary bg-gray-200">
                  <div class="h-full w-full bg-cover bg-center"
                    data-alt="A close-up of the cookie's texture, showing gooey chocolate."
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB2wih--eXxpdzOIThgcHA1xKTzmqfCXQO6b2bbAuScJKvsalaRewjhmcO0EqljBb12cha9_p9QTY9XVVs0iQMFJ7eG4ss9PsycYGz0OaSNedMv6Y2Q625j5qN_1tsS2tZ3khLCPJAgIPQxpVXAoDExmMnHK9yFuAHq1gGivSdeP6qJsAB4vLG0Nblj5saPUCjXUgoDFouBh-pFjituBylJTJTId-V5dkocgqYfrQG9NnxbpTAFjfNTk_999Jn2VE-SNmsj94b3Taw");'>
                  </div>
                </div>
                <div
                  class="aspect-square w-full cursor-pointer overflow-hidden rounded-lg border border-tertiary/50 bg-gray-200 opacity-70 hover:opacity-100">
                  <div class="h-full w-full bg-cover bg-center" data-alt="A stack of three chocolate chip cookies."
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCVZoYATMl2-KStp64l1T1wOeK9Uc4O_ZTHkpJcN8-96qDU8yfKtW_5kTJAVk4KT-2Q85kWBanHnuxaLUW068Tt3YmxNOOdoNofoG93LEXZ7kwHqZnidoK2fuV2ZGDGzC3N_QY1Ok2NQ7N_JTYmmaD5yy53C-7-wTR5GP2O6rQIoyEFFc_xbLfGJycuuaPgtXGzXAyHInXoG1X4u4EUkSNF4RSWfQ5KXJYQjyD_Z-aD_EpGE6mwcX0fqtMxxrjOg_0Tti5LlH2xWO8");'>
                  </div>
                </div>
                <div
                  class="aspect-square w-full cursor-pointer overflow-hidden rounded-lg border border-tertiary/50 bg-gray-200 opacity-70 hover:opacity-100">
                  <div class="h-full w-full bg-cover bg-center"
                    data-alt="The cookie broken in half to show the melted chocolate inside."
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuASX-8MpWI6BhP61XRGsso-ADruM-zL-waNzS67_HQZ2u8JZZelnJi4SsZsgfT42YIIOFrbd_Fq5ouLOpu010CIXnmHFt2H2x2oUGo9xPWGSF7Ykg39vY53da0xkJO1U3mVJHupy_qhaS-P9WBlSqEQivzP3Xch0O-i163AsKwzxTwyx7RiCizqgET9-Z5m-zJ6xxTAF64m6FX1e_Z2gQZfXwDNoOzgjw_gp5Rs9LbeZ6QBq67UTq5FNiNZllMkloVY8G_RlH8WtMI");'>
                  </div>
                </div>
              </div>
            </div>

            <!-- Right: Details -->
            <div class="flex flex-col gap-6">
              <div class="flex flex-col gap-3">
                <h1 class="font-heading text-4xl font-bold text-secondary dark:text-background-light lg:text-5xl">
                  The Ultimate Chocolate Chip Cookie
                </h1>
                <p class="text-lg text-tertiary dark:text-tertiary/90">
                  A warm, gooey classic with rich, semi-sweet chocolate chunks and a hint of sea salt. Baked fresh daily
                  just for you.
                </p>
                <div class="flex items-center gap-2 pt-2">
                  <div class="flex text-primary">
                    <span class="material-symbols-outlined !text-xl"
                      style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined !text-xl"
                      style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined !text-xl"
                      style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined !text-xl"
                      style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined !text-xl"
                      style="font-variation-settings: 'FILL' 1;">star_half</span>
                  </div>
                  <span class="text-sm font-medium text-tertiary">(128 reviews)</span>
                </div>
              </div>

              <p class="font-heading text-4xl font-bold text-primary">$3.50</p>

              <div class="space-y-4 border-t border-tertiary/50 pt-6">
                <div class="flex items-center justify-between">
                  <label class="text-base font-semibold text-secondary dark:text-tertiary"
                    for="quantity">Quantity</label>
                  <div class="flex items-center rounded-lg border border-tertiary/50">
                    <button
                      class="flex h-10 w-10 items-center justify-center rounded-l-md text-tertiary transition hover:bg-primary/10">
                      -
                    </button>
                    <input
                      class="h-10 w-12 border-x border-tertiary/50 bg-transparent text-center font-semibold text-secondary dark:text-background-light focus:outline-none focus:ring-0"
                      id="quantity" type="text" value="1" />
                    <button
                      class="flex h-10 w-10 items-center justify-center rounded-r-md text-tertiary transition hover:bg-primary/10">
                      +
                    </button>
                  </div>
                </div>
                <button
                  class="flex w-full items-center justify-center gap-2 rounded-xl bg-primary py-3.5 text-base font-bold text-white shadow-md transition hover:bg-secondary">
                  <span class="material-symbols-outlined">add_shopping_cart</span>
                  Add to Cart
                </button>
              </div>

              <div class="space-y-4 border-t border-tertiary/50 pt-6">
                <details class="group" open>
                  <summary
                    class="flex cursor-pointer list-none items-center justify-between font-semibold text-secondary dark:text-background-light">
                    Full Description
                    <div class="transition-transform group-open:rotate-180">
                      <span class="material-symbols-outlined">expand_more</span>
                    </div>
                  </summary>
                  <p class="mt-2 text-tertiary dark:text-tertiary/90">
                    Our Ultimate Chocolate Chip Cookie is a timeless masterpiece, perfected over years of baking. We use
                    only the finest ingredients: creamy European butter, rich brown sugar, and large, semi-sweet
                    chocolate
                    chunks that melt in your mouth. A delicate sprinkle of flaky sea salt on top balances the sweetness,
                    creating a truly unforgettable experience with every bite.
                  </p>
                </details>
                <div class="border-t border-tertiary/50"></div>
                <details class="group">
                  <summary
                    class="flex cursor-pointer list-none items-center justify-between font-semibold text-secondary dark:text-background-light">
                    Ingredients &amp; Allergens
                    <div class="transition-transform group-open:rotate-180">
                      <span class="material-symbols-outlined">expand_more</span>
                    </div>
                  </summary>
                  <p class="mt-2 text-tertiary dark:text-tertiary/90">
                    <strong>Ingredients:</strong> Unbleached all-purpose flour, butter, brown sugar, granulated sugar,
                    semi-sweet chocolate chips, eggs, vanilla extract, baking soda, sea salt. <br />
                    <strong>Contains:</strong> Wheat, Dairy, Eggs. May contain traces of nuts.
                  </p>
                </details>
              </div>
            </div>
          </div>
        </div>
      </main>

      <!-- Footer -->
      <footer class="mt-16 w-full border-t border-tertiary/50 bg-background-light dark:bg-background-dark">
        <div class="container mx-auto grid grid-cols-2 gap-8 px-4 py-12 md:grid-cols-4">
          <div class="col-span-2 flex flex-col gap-4 pr-8 md:col-span-1">
            <div class="flex items-center gap-3 text-secondary dark:text-background-light">
              <div class="size-6 text-primary">
                <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M24 45.8096C19.6865 45.8096 15.4698 44.5305 11.8832 42.134C8.29667 39.7376 5.50128 36.3314 3.85056 32.3462C2.19985 28.361 1.76794 23.9758 2.60947 19.7452C3.451 15.5145 5.52816 11.6284 8.57829 8.5783C11.6284 5.52817 15.5145 3.45101 19.7452 2.60948C23.9758 1.76795 28.361 2.19986 32.3462 3.85057C36.3314 5.50129 39.7376 8.29668 42.134 11.8833C44.5305 15.4698 45.8096 19.6865 45.8096 24L24 24L24 45.8096Z"
                    fill="currentColor"></path>
                </svg>
              </div>
              <h2 class="font-heading text-xl font-bold tracking-tight">Cookie Co.</h2>
            </div>
            <p class="text-sm text-tertiary">
              Freshly baked cookies, delivered with love from our kitchen to yours.
            </p>
          </div>
          <div>
            <h3 class="font-bold text-secondary dark:text-background-light">Shop</h3>
            <ul class="mt-4 space-y-2 text-sm text-tertiary">
              <li><a class="hover:text-primary" href="#">Classic Cookies</a></li>
              <li><a class="hover:text-primary" href="#">Seasonal Specials</a></li>
              <li><a class="hover:text-primary" href="#">Gift Boxes</a></li>
              <li><a class="hover:text-primary" href="#">Subscriptions</a></li>
            </ul>
          </div>
          <div>
            <h3 class="font-bold text-secondary dark:text-background-light">Company</h3>
            <ul class="mt-4 space-y-2 text-sm text-tertiary">
              <li><a class="hover:text-primary" href="#">About Us</a></li>
              <li><a class="hover:text-primary" href="#">Contact Us</a></li>
              <li><a class="hover:text-primary" href="#">FAQ</a></li>
              <li><a class="hover:text-primary" href="#">Careers</a></li>
            </ul>
          </div>
          <div>
            <h3 class="font-bold text-secondary dark:text-background-light">Follow Us</h3>
            <ul class="mt-4 space-y-2 text-sm text-tertiary">
              <li><a class="hover:text-primary" href="#">Instagram</a></li>
              <li><a class="hover:text-primary" href="#">Facebook</a></li>
              <li><a class="hover:text-primary" href="#">Twitter</a></li>
            </ul>
          </div>
        </div>
        <div class="border-t border-tertiary/50 py-6">
          <p class="text-center text-sm text-tertiary">© 2024 Cookie Co. All rights reserved.</p>
        </div>
      </footer>
    </div>
  </div>
</body>

</html>