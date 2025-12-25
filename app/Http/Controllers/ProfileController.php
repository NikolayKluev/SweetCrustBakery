<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
     public function index()
    {
        // Загружаем заказы пользователя (новые сначала)
        $orders = Order::where('user_id', Auth::user()->id)->latest()->get();       

        // Корзина — временные данные (пример через сессию)
        $cart = session()->get('cart', []);

        return view('auth.profile.index', compact('orders', 'cart'));
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|numeric',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Обновляем имя и email
        $user->name = $request->name;
        $user->email = $request->email;

        // Обработка аватара
        if ($request->hasFile('avatar')) {
            // Удаляем старое фото
            if ($user->profile_picture) {
                Storage::disk('public')->delete('avatars/' . $user->profile_picture);
            }

            // Сохраняем новое
            $file = $request->file('avatar');
            $filename = time() . '_' . $user->id . '.' . $file->getClientOriginalExtension();
            $file->storeAs('avatars', $filename, 'public');

            $user->profile_picture = $filename;
        }

        $user->save();

        return back()->with('success', 'Данные успешно обновлены!');
    }
}
