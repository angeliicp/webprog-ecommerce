<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function adm_index() {
        $orders = Order::with('products')->get();
    }

    public function index() {
        $orders = Order::with('products')
                    ->where('user_id', 2)
                    ->get(); 

        $data = [
            'orders' => $orders,
        ];

        return view('order.order_list', $data);
    }

    public function create() {
        $cartItems = Cart::with('product')
                        ->where('user_id', 2)
                        ->get();
                        
        $user = User::find(2); // later this will be changed to the logged in user

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Cart is empty.');
        }

        $originalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
    
        $pickupFee = 9000; // default value
        $tax = $originalPrice * 0.10;
        $total = $originalPrice + $pickupFee + $tax;

        $data = [
            'user' => $user,
            'cartItems' => $cartItems,
            'originalPrice' => $originalPrice,
            'pickupFee' => $pickupFee,
            'tax' => $tax,
            'total' => $total,
        ];

        return view('order.checkout', $data);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,prod_id',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*.price' => 'required|numeric|min:0',
            'total_price' => 'required|numeric',
        ]);

        $order = Order::create([
            'user_id' => 2,
            'total_price' => $validated['total_price'],
            'status' => 'pending',
        ]);

        foreach ($validated['products'] as $product) {
            $order->products()->attach($product['id'], [
                'quantity' => $product['quantity'],
                'price' => $product['price'],
            ]);
        }

        Cart::where('user_id', 2)->delete();

        return redirect(route('cart.index'));
    }

    public function show($id) {
        return view('order.order_detail');
    }
}
