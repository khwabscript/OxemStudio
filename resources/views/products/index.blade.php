@extends('layout')

@section('style')
<link rel="stylesheet" type="text/css" href="/css/main.css">
<style type="text/css">
    .item {
        background: #2980B9;
        background: -webkit-linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9);
        background: linear-gradient(to top, #FFFFFF, #6DD5FA);
        border-color: #6DD5FA;
    }
</style>
@endsection

@section('content')
<div class="container flex flex-wrap justify-around m-auto my-4">
    <div class="w-full mb-6">
        <div class="float-right">
            <span class="font-medium">Sort by:</span>
            @foreach(['Price: Low to High' => ['price', 'asc'], 'Price: High to Low'  => ['price', 'desc'], 'Date: Old to New' => ['created_at', 'asc'], 'Date: New to Old' => ['created_at', 'desc']] as $key => $value)
                <a href="?sort={{ $value[0] }}&amp;order={{ $value[1] }}" class="mx-2 hover:underline">{{ $key }}</a>
            @endforeach
        </div>
    </div>
    @foreach ($products as $product)
        @include('products.item')
    @endforeach
    <div class="md:w-1/4 sm:w-1/3 m-2"></div>
    
    {{ $products->withQueryString()->links() }}
</div>
@endsection