@extends('layouts.app')

@section('title', 'Store Product List')

@section('content')
<div class="card mb-3">
    <div class="card-body py-3">
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add New Product</a>

        <form method="GET" action="{{ route('products.index') }}" class="row g-2">
    <div class="col-md-4">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search product name">
    </div>

    <div class="col-md-3">
        <select name="category" class="form-select">
            <option value="">All categories</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}"
                    @selected(request('category') == $cat->id)>{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-2">
        <select name="available" class="form-select">
            <option value="">Any status</option>
            <option value="1" @selected(request('available') === '1')>Available</option>
            <option value="0" @selected(request('available') === '0')>Unavailable</option>
        </select>
    </div>

    <div class="col-md-3">
        <select name="sort" class="form-select">
            <option value="name"  @selected($sort === 'name')>Sort by name</option>
            <option value="price" @selected($sort === 'price')>Sort by price</option>
            <option value="stock" @selected($sort === 'stock')>Sort by stock</option>
        </select>
    </div>

    <div class="col-12">
        <button class="btn btn-primary">Apply</button>
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Clear</a>
    </div>
</form>
    </div>
</div>

<table class="table table-striped table-bordered">
    <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Category</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    @forelse ($products as $product)
    <tr>
        <td>{{ $products->firstItem() + $loop->index }}</td>
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
        <td>
            @if ($product->is_available)
                <span class="badge bg-success">Available</span>
            @else
                <span class="badge bg-secondary">Unavailable</span>
            @endif
        </td>
        <td>
            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this record?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
    @empty
    <tr><td colspan="7">No products are available.</td></tr>
    @endforelse
</table>

{{ $products->links() }}

@endsection