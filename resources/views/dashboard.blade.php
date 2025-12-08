@extends('layouts.admin')

@section('content')
<div class="dashboard-heading">
    <p class="dashboard-title">Admin Dashboard</p>
    <p class="dashboard-subtitle">
        Welcome back, {{ Auth::user()->name }}! Here's a summary of your store.
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
@endsection
