<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index() {
        // in the future will only display the review written by the logged in user
        $reviews = Rating::with('product')
                    ->with('user')
                    ->get();

        $data = [
            'reviews' => $reviews
        ];

        // dd($reviews);
        return view('review.review_index', $data);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'user_id' => 'required|numeric',
            'prod_id' => 'required|numeric',
            'rating' => 'required|numeric|between:1,5',
            'review' => 'string',
        ]);

        Rating::create([
            'user_id' => $validated['user_id'],
            'prod_id' => $validated['prod_id'],
            'rating' => $validated['rating'],
            'review' => $validated['review'],
        ]);
        
        return back();
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'rating' => 'required|numeric|between:1,5',
            'review' => 'string',
        ]);

        Rating::where('rate_id', $id)->update($validated);

        return back();
    }

    public function destroy($id) {
        Rating::where('rate_id', $id)->delete();
        
        return back();
    }

    public function ban(Request $request, $id) {
        $validated = $request->validate([
            'is_banned' => 'required|boolean',
        ]);

        Rating::where('rate_id', $id)->update($validated);

        return back();
    }
}
