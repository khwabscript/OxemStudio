<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class ProductController extends Controller
{
    public function index()
    {
    	if (request()->has(['sort', 'order'])) {

		    $query = request()->validate([
	    		'sort' => ['required', 'in:price,created_at'],
	    		'order' => ['required', 'in:asc,desc']
	    	]);

		    $products = Product::orderBy($query['sort'], $query['order'])->paginate(50);

	    	return response()->json($products);
		}
    	
    	$products = Product::paginate(50);

    	return response()->json($products);
    }

    public function create()
    {
    	return view('products.create');
    }

    public function store()
    {
        return request();
    	$message = [];
    	$attributes = $this->validateProduct();

    	try {
            
            $product = Product::create($attributes);

            $product->categories()->attach($attributes['category_id']);

	    	$message['success'] = true;
	    	$message['product_id'] = $product->id;

    	} catch (\Throwable $e) {

    		$message['success'] = false;
	    	$message['error'] = $e->getCode();

	    }
    	
    	return json_encode($message);
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function destroy(Product $product)
    {

        $message['success'] = true;
        $product->delete();
        try {

            $product->delete();

        } catch (\Throwable $e) {

            $message['success'] = false;
            $message['error'] = $e->getCode();

        }
        
        return response()->json($message);
    }

    protected function validateProduct()
    {
    	return request()->validate([
    		'name' => ['required', 'string', 'max:200'],
    		'description' => ['nullable', 'string', 'max:1000'],
    		'price' => ['required', 'between:0,999999.99'],
    		'quantity' => ['required', 'integer'],
            'category_id' => ['required', 'array', 'exists:categories,id'],
    		'external_id' => ['required', 'integer', 'unique:products'],
    	]);
    }
}
