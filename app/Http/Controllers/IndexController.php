<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::select('name', 'slug', 'image')->get();

        $products = Product::select('products.id', 'products.name', 'products.image', 'products.price', 'products.sale_price', 'products.tag', 'products.slug', 'categories.name as categoryName', 'categories.slug as categorySlug')
            ->join('categories', 'products.category_id', '=', 'categories.id') // Join on category_id foreign key
            ->get();

        return view('index', compact('categories', 'products'));
    }
}
