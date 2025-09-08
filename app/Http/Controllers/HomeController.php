<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\VisualContent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $latest_products = Product::with('visual_contents')
                                ->orderByDesc('prod_id')
                                ->withCount('has_rating')
                                ->withAvg('has_rating', 'rating')
                                ->take(8)
                                ->get();
        // Raw SQL Query
        // SELECT * FROM products ORDER BY created_at DESC LIMIT 8

        $data = [
            'latest_products' => $latest_products,
        ];

        return view('index', $data);
    }
}
