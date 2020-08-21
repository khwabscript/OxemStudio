@extends('layout')

@section('content')
<form method="POST" action="/products">
	@csrf
	
	<label>Name</label>
	<input type="text" name="name">
	<label>Description</label>
	<input type="text" name="description">
	<label>Price</label>
	<input type="number" name="price" step="0.01">
	<label>Quantity</label>
	<input type="number" name="quantity" min="1">
	<label>Category_id</label>
	<input type="number" name="category_id[]" min="1">
	<label>External ID</label>
	<input type="number" name="external_id" min="1">

	<input type="submit">
</form>
@endsection