<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Product;
use Illuminate\Http\Request;

class ModProductController extends Controller
{
    public function index() {
        $products = Product::with('visual_contents')
                    ->get();

        $data = [
            'products' => $products,
        ];
        return view('admin.p_adm_index', $data);
    }

    public function show($id) {
        $product = Product::with('visual_contents')->findOrFail($id);
        $ratings = Rating::where('prod_id', $id)->get();
        $avg = Rating::where('prod_id', $id)->avg('rating');

        $avgRating = ($avg == floor($avg)) ? number_format($avg, 0) : number_format($avg, 2);
        $totalReviews = Rating::where('prod_id', $id)->count();

        $data = [
            'product' => $product,
            'ratings' => $ratings,
            'avgRating' => $avgRating,
            'totalReviews' =>$totalReviews,
        ];

        return view('product.p_detail', $data);
    }

    public function listing(Request $request, $id) {
        $validated = $request->validate([
            'is_listed' => 'required|boolean',
        ]);

        Product::where('prod_id', $id)->update($validated);

        return back();
    }
}
