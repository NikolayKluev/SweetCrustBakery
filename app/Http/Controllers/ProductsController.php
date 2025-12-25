<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\OrderItem;

class ProductsController extends Controller
{
    function index() {    
        // Загружаем все категории с товарами
        $categories = Category::with('products')->get();

        // Или, если нужно все товары отдельно
        $products = Product::with('categories')->get(); 
        
        return view('catalog', compact('categories', 'products'));        
    }

    // Показать товары одной категории
    public function showByCategory($categoryId)
    {
        $category = Category::with('products')->findOrFail($categoryId);
        $categories = Category::all(); 
        //$products = Product::whereIn('category_id', '==', $categoryId)->get();

       return view('products.show', compact('category', 'categories'));
    }
}
