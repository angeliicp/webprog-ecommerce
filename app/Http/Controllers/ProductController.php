<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function search(Request $request) {
        $query = $request->input('product-search');

        $products = Product::with('visual_contents')
                    ->where(function ($q) use ($query) {
                        $q->where('prod_name', 'like', "%{$query}%")
                        ->orWhere('keyword', 'like', "%{$query}%");

                        if ($query === 'today') {
                            $q->orWhereDate('created_at', Carbon::today());
                        } elseif ($query === 'yesterday') {
                            $q->orWhereDate('created_at', Carbon::yesterday());
                        } elseif ($query === 'this week') {
                            $q->orWhereBetween('created_at',  [Carbon::now()->startOfWeek(), Carbon::today()]);
                        } elseif ($query === 'last week') {
                            $q->orWhereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]);
                        } elseif ($query === 'this month') {
                            $q->orWhereBetween('created_at',  [Carbon::now()->startOfMonth(), Carbon::today()]);
                        } elseif ($query === 'last month') {
                            $q->orWhereBetween('created_at', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()]);
                        }
                    })
                    ->get();
        
        $data = [
            'query' => $query,
            'products' => $products,
        ];

        return view('product.p_index', $data);
    }

    public function liveSearch(Request $request)
    {
        $query = $request->input('q');

        $products = Product::with('visual_contents')
                    ->where(function ($q) use ($query) {
                        $q->where('prod_name', 'like', "%{$query}%")
                        ->orWhere('keyword', 'like', "%{$query}%");

                        if ($query === 'today') {
                            $q->orWhereDate('created_at', Carbon::today());
                        } elseif ($query === 'yesterday') {
                            $q->orWhereDate('created_at', Carbon::yesterday());
                        } elseif ($query === 'this week') {
                            $q->orWhereBetween('created_at',  [Carbon::now()->startOfWeek(), Carbon::today()]);
                        } elseif ($query === 'last week') {
                            $q->orWhereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]);
                        } elseif ($query === 'this month') {
                            $q->orWhereBetween('created_at',  [Carbon::now()->startOfMonth(), Carbon::today()]);
                        } elseif ($query === 'last month') {
                            $q->orWhereBetween('created_at', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()]);
                        }
                    })
                    ->get();

        return response()->json($products);
    }

    public function index() {
        $products = Product::with('visual_contents')
                    ->withCount('has_rating')
                    ->withAvg('has_rating', 'rating')
                    ->get();

        $data = [
            'products' => $products,
        ];

        // dd($products);
        return view('product.p_index', $data);
    }

    public function show($id) {
        $product = Product::with('visual_contents')->findOrFail($id);
        $ratings = Rating::where('prod_id', $id)->get();
        $avg = Rating::where('prod_id', $id)->avg('rating');

        $avgRating = ($avg == floor($avg)) ? number_format($avg, 0) : number_format($avg, 2);
        $totalReviews = Rating::where('prod_id', $id)->count();

        $keyword = $product->keyword;
        $recommendations = Product::with('visual_contents')
            ->where('prod_id', '!=', $product->prod_id)
            ->where('keyword', 'like', "%{$keyword}%")
            ->limit(6)
            ->get();

        $data = [
            'product' => $product,
            'ratings' => $ratings,
            'avgRating' => $avgRating,
            'totalReviews' =>$totalReviews,
            'recommendations' => $recommendations
        ];

        return view('product.p_detail', $data);
    }
}
