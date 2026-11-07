@extends('layouts.app')

@section('title', 'Page not found')

@section('content')
    <h1>Page not found</h1>
    <p>We couldn't find that product. Check the address and try again.</p>
    <a href="{{ route('products.index') }}">Back to the list</a>
@endsection