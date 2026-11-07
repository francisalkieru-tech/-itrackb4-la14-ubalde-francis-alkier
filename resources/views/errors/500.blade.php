@extends('layouts.app')

@section('title', 'Server error')

@section('content')
    <h1>Something went wrong</h1>
    <p>Sorry, our system ran into a problem. Please try again in a few minutes.</p>
    <a href="{{ route('products.index') }}">Back to the list</a>
@endsection