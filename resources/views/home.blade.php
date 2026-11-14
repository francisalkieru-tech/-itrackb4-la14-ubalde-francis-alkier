@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="p-5 mb-4 bg-white rounded-3 shadow-sm">
    <h2>Product Lists Record System</h2>
    <p class="text-muted mb=4">Easily add, search, and filter your store's products to track prices and stock levels at a glance.</p>
    <a href="{{ route('products.index') }}" class="btn btn-primary">View all products</a>
</div>

<div class="row g-3 mb-4">
    <div class="col-sm-6">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <div class="display-6 fw-bold">{{ $productCount }}</div>
                <div class="text-muted">Products on records</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <div class="display-6 fw-bold">{{ $categoryCount }}</div>
                <div class="text-muted">categories</div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body d-flex align-items-center gap-4">
        <img src="{{ asset('img/me (1).jpg') }}" alt="" width="96" height="96" class="rounded-circle object-fit-cover">
        <div>
            <h5 class="mb-1">Francis Alkier Ubalde</h5>
            <div class="text-muted small">Course: BSIT, Year: 4th year, Block: 4C</div>
        </div>
    </div>

</div>
@endsection