<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Product;

class HomeController extends Controller
{
    
    public function index()
    {
         // Получаем популярные товары
        $popularProducts = OrderItem::select('product_id')
            ->selectRaw('products.name, products.image_url, COUNT(*) as total_orders')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->groupBy('product_id', 'products.name', 'products.image_url')
            ->orderByDesc('total_orders')
            ->limit(6)
            ->get();

        $arr_pop = $popularProducts->chunk(3);    
        $prod_ran = Product::inRandomOrder()->limit(6)->get();

        return view('home', compact('popularProducts', 'arr_pop', 'prod_ran'));        
    }
}
