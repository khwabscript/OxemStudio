@extends('layout')

@section('title', 'Create product')

@section('style')
<link rel="stylesheet" type="text/css" href="/css/main.css">
@endsection

@section('content')
<div class="container flex flex-wrap justify-around m-auto my-4">
    <form class="w-full max-w-lg" method="POST" action="/products">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            @foreach(
                [
                    'name' => 'text',
                    'description' => 'text',
                    'price' => 'number',
                    'quantity' => 'number',
                    'external_id' => 'number',
                    'category_id[]' => 'number',
                    'category_id[]' => 'number',
                ]
            as $key => $value)
                @include('products.input')
            @endforeach
            <input type="text" name="category_id[]">
            <input type="text" name="category_id[]">
            <div class="w-full {{ $value !== 'text' ? 'md:w-1/2' : '' }} px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Click me
                </label>
                <button class="appearance-none w-full mb-3 border border-blue-500 hover:border-blue-700 leading-tight bg-blue-500 hover:bg-blue-700 text-white font-bold lg:tracking-wider py-3 px-4 rounded focus:outline-none focus:shadow-outline" type="sumbit">
                Create
                </button>
            </div>
            </div>
        </div>
    </form>
</div>

@endsection