<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class PagesController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }
    
    public function updateCategory($category_id)
    {
        $categoryId = $category_id;
        $category = Category::find($categoryId);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }
        return view('update-category', compact('category'));
    }

    public function products()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('products', compact('products','categories'));
    }

    public function updateProduct($product_id)
    {
        $productId = $product_id;
        $product = Product::find($productId);
        $categories = Category::all();

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        return view('update-product', compact('product','categories'));
    }
}
