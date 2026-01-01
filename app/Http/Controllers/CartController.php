<?php

namespace App\Http\Controllers;

use App\Enums\OrdersStatus;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Order_Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Enums\PaymentStatus;

class CartController extends Controller
{
    public function add(Request $request, Product $product)
    {        

        $request->validate([            
            'quantity' => 'required|integer|min:1|max:100',
        ]);
        
       
        $cart = session()->get('cart', []);        
        $id = $product->id;
        $quantity = $request->integer('quantity') ?? 1;
        $price = (float)$product->price;

        $quantity = max(1, $quantity);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $price,
                'quantity' => $quantity,
                'image' => $product->image_url,
            ];
        }

        session()->put('cart', $cart);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Товар добавлен в корзину!',  
                'cart_count' => array_sum(array_column($cart, 'quantity'))          
            ]);
         }

        return redirect()->back()->with('success', 'Товар добавлен в корзину!');
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('profile')->with('error', 'Корзина пуста.');
        }

        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        return view('cart.checkout', compact('cart', 'total'));
    }

    public function remove(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Товар удалён из корзины.');
    }
}
