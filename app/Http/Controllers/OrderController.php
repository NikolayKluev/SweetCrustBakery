<?php

namespace App\Http\Controllers;

use App\Enums\OrdersStatus;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Enums\PaymentStatus;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function store(Request $request)
    {       

            $cart = $request->session()->get('cart', []);

            if (empty($cart)) {
                return redirect()->route('profile')->with('error', 'Корзина пуста.');
            }

            $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

            $order = Order::create([
                'user_id' => Auth::user()->id,
                'total_price' => $total,
                'status' => OrdersStatus::PENDING,
                'payment_status' => PaymentStatus::PAID,
            ]);

            foreach ($cart as $productId => $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            $request->session()->forget('cart');

            return redirect()
                ->route('profile')
                ->with('success', 'Заказ №' . $order->id . ' успешно оформлен!')
                ->with('scrollTo', 'orders');
    }
}
