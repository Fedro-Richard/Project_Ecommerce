<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Admin Dashboard - Florenoria</title>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        rel="stylesheet"
    />

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
                        <a href="#" data-nav="dashboard" class="dashboard-nav-link">
                            <span class="material-symbols-outlined dashboard-nav-icon">dashboard</span>
                            <span class="dashboard-nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-nav="sales" class="dashboard-nav-link">
                            <span class="material-symbols-outlined dashboard-nav-icon">bar_chart</span>
                            <span class="dashboard-nav-label">Sales Reports</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-nav="orders" class="dashboard-nav-link">
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
                    <li>
                        <a href="#" data-nav="payments" class="dashboard-nav-link">
                            <span class="material-symbols-outlined dashboard-nav-icon">payment</span>
                            <span class="dashboard-nav-label">Payments</span>
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
                        <p class="dashboard-admin-name">Admin</p>
                        <p class="dashboard-admin-email">admin@cookieco.com</p>
                    </div>
                    <button type="button" class="dashboard-logout-button" aria-label="Log out">
                        <span class="material-symbols-outlined">logout</span>
                    </button>
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
                            src="{{ asset('images/florenoria-logo.png') }}"
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
                    <div class="dashboard-heading">
                        <p class="dashboard-title">Admin Dashboard</p>
                        <p class="dashboard-subtitle">
                            Welcome back, Admin! Here's a summary of your store.
                        </p>
                    </div>

                    <div class="dashboard-cards-grid">
                        {{-- Total Sales --}}
                        <article class="dashboard-card">
                            <div class="dashboard-card-header">
                                <div class="dashboard-card-icon-wrapper">
                                    <span class="material-symbols-outlined dashboard-card-icon">monitoring</span>
                                </div>
                                <div class="dashboard-card-text">
                                    <p class="dashboard-card-label">Total Sales</p>
                                    <p class="dashboard-card-value">Rp 1.234.567</p>
                                </div>
                            </div>
                        </article>

                        {{-- Total Orders --}}
                        <article class="dashboard-card">
                            <div class="dashboard-card-header">
                                <div class="dashboard-card-icon-wrapper">
                                    <span class="material-symbols-outlined dashboard-card-icon">shopping_cart</span>
                                </div>
                                <div class="dashboard-card-text">
                                    <p class="dashboard-card-label">Total Orders</p>
                                    <p class="dashboard-card-value">1,234</p>
                                </div>
                            </div>
                        </article>

                        {{-- Pending Orders --}}
                        <article class="dashboard-card">
                            <div class="dashboard-card-header">
                                <div class="dashboard-card-icon-wrapper">
                                    <span class="material-symbols-outlined dashboard-card-icon">pending_actions</span>
                                </div>
                                <div class="dashboard-card-text">
                                    <p class="dashboard-card-label">Pending Orders</p>
                                    <p class="dashboard-card-value">28</p>
                                </div>
                            </div>
                        </article>

                        {{-- Low Stock Products --}}
                        <article class="dashboard-card">
                            <div class="dashboard-card-header">
                                <div class="dashboard-card-icon-wrapper">
                                    <span class="material-symbols-outlined dashboard-card-icon">inventory</span>
                                </div>
                                <div class="dashboard-card-text">
                                    <p class="dashboard-card-label">Low Stock Products</p>
                                    <p class="dashboard-card-value">5</p>
                                </div>
                            </div>
                        </article>

                        {{-- New Customers --}}
                        <article class="dashboard-card">
                            <div class="dashboard-card-header">
                                <div class="dashboard-card-icon-wrapper">
                                    <span class="material-symbols-outlined dashboard-card-icon">person_add</span>
                                </div>
                                <div class="dashboard-card-text">
                                    <p class="dashboard-card-label">New Customers</p>
                                    <p class="dashboard-card-value">12</p>
                                </div>
                            </div>
                        </article>

                        {{-- Pending Payments --}}
                        <article class="dashboard-card">
                            <div class="dashboard-card-header">
                                <div class="dashboard-card-icon-wrapper">
                                    <span class="material-symbols-outlined dashboard-card-icon">hourglass_top</span>
                                </div>
                                <div class="dashboard-card-text">
                                    <p class="dashboard-card-label">Pending Payments</p>
                                    <p class="dashboard-card-value">15</p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </main>
        </div>
    </div>
</main>
</body>
</html>
