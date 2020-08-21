<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public $timestamps = false;

	protected $fillable = ['name', 'description', 'price', 'quantity', 'external_id'];

    public function categories()
    {
    	return $this->belongsToMany(Category::class);
    }
}
