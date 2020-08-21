@extends('layout')

@section('content')
<form method="POST" action="/categories/{{ $category->id }}">
	@csrf
	@method('PUT')

	<label>Name</label>
	<input type="text" name="name" value="{{ $category->name }}">
	<label>Parent ID</label>
	<input type="number" name="parent_id" value="{{ $category->parent_id }}">
	<label>External ID</label>
	<input type="number" name="external_id" min="1" value="{{ $category->external_id }}">

	<input type="submit">
</form>
@endsection