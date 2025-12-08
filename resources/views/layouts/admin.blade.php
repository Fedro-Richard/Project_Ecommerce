<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'Admin Dashboard - Florenoria')</title>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />

    {{-- CSS & JS khusus dashboard --}}
    @vite(['resources/css/dashboard.css', 'resources/js/dashboard.js'])
</head>
<body>
<main class="dashboard-main-wrapper">
    <div class="dashboard-root">
        {{-- SIDEBAR --}}
        <aside id="sidebar" class="dashboard-sidebar">
            {{-- Logo Florenoria --}}
            <div class="dashboard-sidebar-header">
                <img
                    src="{{ asset('images/florenoria.png') }}"
                    alt="Florenoria"
                    class="dashboard-logo-img"
                />
            </div>

            {{-- Sidebar menu --}}
            <nav class="dashboard-nav">
                <ul class="dashboard-nav-list">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="dashboard-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <span class="material-symbols-outlined dashboard-nav-icon">dashboard</span>
                            <span class="dashboard-nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.transactions.index') }}" class="dashboard-nav-link {{ request()->routeIs('admin.transactions.*') ? 'active' : '' }}">
                            <span class="material-symbols-outlined dashboard-nav-icon">receipt_long</span>
                            <span class="dashboard-nav-label">Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-nav="products" class="dashboard-nav-link">
                            <span class="material-symbols-outlined dashboard-nav-icon">inventory_2</span>
                            <span class="dashboard-nav-label">Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-nav="customers" class="dashboard-nav-link">
                            <span class="material-symbols-outlined dashboard-nav-icon">group</span>
                            <span class="dashboard-nav-label">Customers</span>
                        </a>
                    </li>
                </ul>
            </nav>

            {{-- Admin info --}}
            <div class="dashboard-admin-info">
                <div class="dashboard-admin-inner">
                    <div class="dashboard-admin-avatar"
                         aria-hidden="true"
                         style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCGyNpfJ_rXhVCXx6RXIMd9X6Lj3em8cougWr2PyCrrtAo2SYpSrJD2tH_FZnR6WIfRZ0ZdXBoK75OFvnF4a_JY_76Uv37pSDfNeZW-h8X3kMcO8kBNdiRuA4g0lP_IrQGCJvyJQh8KOWG_PJ24RQChHV1sp_f41hoIxxBytvCjERYCOqCkNXy35tws4WgmM5giI8a0DkTMVan2FiYhHG9pLjQOVGy3Aue7uc8bi3BKU-ar5fwGkH-thZSVLSl3q7zDkely5t0V9O8");'>
                    </div>
                    <div class="dashboard-admin-text">
                        <p class="dashboard-admin-name">{{ Auth::user()->name }}</p>
                        <p class="dashboard-admin-email" style="font-size: 0.7rem;">{{ Auth::user()->email }}</p>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dashboard-logout-button" aria-label="Log out">
                            <span class="material-symbols-outlined">logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        {{-- MAIN AREA --}}
        <div class="dashboard-main">
            {{-- Mobile header --}}
            <header class="dashboard-header-mobile">
                <div class="dashboard-header-inner">
                    <div class="dashboard-header-brand">
                        <img
                            src="{{ asset('images/florenoria.png') }}"
                            alt="Florenoria"
                            class="dashboard-logo-img dashboard-logo-img-mobile"
                        />
                    </div>
                    <button
                        type="button"
                        aria-label="menu"
                        class="dashboard-menu-button">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                </div>
            </header>

            {{-- Main content --}}
            <main class="dashboard-content-section">
                <div class="dashboard-content-container">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</main>
</body>
</html>
