@extends('layout')

@section('content')
<form method="POST" action="/categories">
	@csrf
	
	<label>Name</label>
	<input type="text" name="name">
	<label>Parent ID</label>
	<input type="number" name="parent_id">
	<label>External ID</label>
	<input type="number" name="external_id" min="1">

	<input type="submit">
</form>
@endsection