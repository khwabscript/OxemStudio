<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	
    	$categories = Category::all();

    	return response()->json($categories);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store()
    {
    	$message['success'] = true;
    	$attributes = $this->validateCategory();

    	try {

    		$category = Category::create($attributes);

	    	$message['category_id'] = $category->id;

    	} catch (\Throwable $e) {

    		$message['success'] = false;
	    	$message['error'] = $e->getCode();

	    }
    	
    	return response()->json($message);
    }

    public function show(Category $category)
    {
        return response()->json($category);
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Category $category)
    {
        $message['success'] = true;
        $attributes = $this->validateCategory($category->id);

        try {

            $category->update($attributes);

            $message['category_id'] = $category->id;

        } catch (\Throwable $e) {

            $message['success'] = false;
            $message['error'] = $e->getCode();

        }
        
        return response()->json($message);
    }

    public function destroy(Category $category)
    {
    	$message['success'] = true;

    	try {

    		$category->delete();

    	} catch (\Throwable $e) {

    		$message['success'] = false;
	    	$message['error'] = $e->getCode();

	    }
    	
    	return response()->json($message);
    	
    }

    protected function validateCategory(int $except_id = 0)
    {
    	return request()->validate([
    		'name' => ['required', 'string', 'max:200'],
            'parent_id' => ['nullable', 'integer', 'exists:categories,id'],
    		'external_id' => ['required', 'integer', 'unique:categories,external_id,' . $except_id],
    	]);
    }

    protected function showProducts(Category $category)
    {
        return response()->json( $category->products );
    }
}
