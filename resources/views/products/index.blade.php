@extends('layouts.app')

@section('title', 'Store Product List')

@section('content')
<div class="card mb-3">
    
    <div class="card-body py-3">
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add New Product</a>
        @if (!$category && !$stock)
            <span class="badge bg-light text-dark border">Showing all products</span>
            @else
            @if($category)
            <span class="badge bg-info text-dark">Category: {{ $categories->firstWhere('id', $category)?->name }}</span>
            @endif
            
            @if($stock)
            <span class="badge bg-warning text-dark">Stock: {{ $stock }}</span>
            @endif
        @endif
        <hr class="my-2">
        
        <div class="mb-2">
            <strong>Category:</strong>

             <a href="{{ route('products.index', ['stock' => $stock]) }}"
             class="btn btn-sm {{ !$category ? 'btn-primary' : '' }}">All</a>
             @foreach ($categories as $cat)
             <a href="{{ route('products.index', ['category' => $cat->id, 'stock' => $stock]) }}"
             class="btn btn-sm {{ $category == $cat->id ? 'btn-primary' : '' }}">{{ $cat->name }}</a>
             @endforeach
        </div>

        <div class="mb-2">
            <strong>Stock:</strong>
            <a href="{{ route('products.index', ['category' => $category]) }}"
               class="btn btn-sm {{ !$stock ? 'btn-secondary' : '' }}">All</a>
            <a href="{{ route('products.index', ['category' => $category, 'stock' => 'low']) }}"
               class="btn btn-sm {{ $stock == 'low' ? 'btn-secondary' : '' }}">Low</a>
            <a href="{{ route('products.index', ['category' => $category, 'stock' => 'normal']) }}"
               class="btn btn-sm {{ $stock == 'normal' ? 'btn-secondary' : '' }}">Normal</a>
        </div>

    </div>
</div>
<table class="table table-striped table-bordered">
    <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Category</th>
    </tr>
    @forelse ($products as $product)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td><a href="{{ route('products.show', $product['id']) }}"> {{ $product['name'] }}</a></td>
        <td>{{ $product['price'] }}</td>
        <td>
            @if ($product['stock'] < 10)
                <p>{{ $product['stock'] }} (Low Stock)</p>
            @else
                {{ $product['stock'] }}
            @endif
        </td>
        <td>{{ $product->category->name }}</td>
    </tr>
    @empty
    <tr><td colspan="5">No products are available.</td></tr>
    @endforelse
</table>
<p>Queries: {{ count(\Illuminate\Support\Facades\DB::getQueryLog()) }}</p>
@endsection