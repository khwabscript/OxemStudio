@extends('layout')

@section('title', $product->name)

@section('style')
<link rel="stylesheet" type="text/css" href="/css/main.css">
<!-- <style type="text/css">
    .item {
        background: #2980B9;
        background: -webkit-linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9);
        background: linear-gradient(to top, #FFFFFF, #6DD5FA);
        border-color: #6DD5FA;
    }
</style> -->
@endsection

@section('content')
<div class="container flex flex-wrap justify-around m-auto my-4">
    <div class="w-full">
        <a href="/products" class="hover:underline">All products</a>
    </div>
    @include('products.item')
    <div class="w-full text-center">
        <a href="/products/{{ $product->id }}/edit" class="mx-2 text-blue-500 hover:underline">Edit</a>
        <form method="POST" action="/products/{{ $product->id }}">
            @csrf
            @method('DELETE')
            <button class="mx-2 text-red-400 hover:underline" type="submit">Delete</button>
        </form>
    </div>
</div>

@endsection