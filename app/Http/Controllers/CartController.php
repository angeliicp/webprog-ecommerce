<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $user = Auth::user();

        $cartItems = Cart::with('product')
                        ->where('user_id', $user->user_id) 
                        ->get();

        $keywords = Product::whereHas('carts', function ($query) {
                                $query->where('user_id', 2);
                            })->pluck('keyword')->toArray();

        $prodIdinCart = [];

        foreach ($cartItems as $item) {
            $prodIdinCart[] = $item->product->prod_id;
        }

        $recommendations = Product::with('visual_contents')
                                ->whereNotIn('prod_id', $prodIdinCart)
                                ->where(function ($q) use ($keywords) {
                                    foreach ($keywords as $k) {
                                        $q->orWhere('keyword', 'like', "%{$k}%");
                                    }
                                })->limit(6)->get();

        $data = [
            'cartItems' => $cartItems,
            'recommendations' => $recommendations,
        ];

        return view('order.cart', $data);
    }

    public function store($id) {
        $cartItem = Cart::where('user_id', 2) //hardcode userid
                    ->where('prod_id', $id)
                    ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => 2,
                'prod_id' => $id,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function update(Request $request, $id) {
        $cart = Cart::where('cart_id', $id)
                ->where('user_id', 2) //hardcode
                ->firstOrFail();

        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart->quantity = $request->quantity;
        $cart->save();

        return response()->json(['message' => 'Quantity updated']);
    }

    public function destroy($id) {
        Cart::where('cart_id', $id)->delete();

        return redirect()->back()->with('info', 'Product removed from cart!');
    }
}
