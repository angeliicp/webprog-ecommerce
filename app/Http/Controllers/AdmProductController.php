<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\VisualContent;

class AdmProductController extends Controller
{
    public function index() {
        $products = Product::with('visual_contents')
                    ->get();

        $data = [
            'products' => $products,
        ];
        return view('admin.p_adm_index', $data);
    }

    public function create() {
        return view('admin.p_adm_create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'prod_name' => 'required|min:3',
            'price' => 'required|numeric',
            'top_notes' => 'required|min:3',
            'mid_notes' => 'required|min:3',
            'base_notes' => 'required|min:3',
            'concentration' => 'required|min:3',
            'fragrance_gender' => 'required|min:3',
            'age_group' => 'required|min:3',
            'keyword' => 'required|min:3',
            'description' => 'required|min:3',
            'filename' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:1024',
            'alt_desc' => 'nullable|min:3',
        ]);

        $product = Product::create([
            'prod_name' => $validated['prod_name'],
            'price' => $validated['price'],
            'top_notes' => $validated['top_notes'],
            'mid_notes' => $validated['mid_notes'],
            'base_notes' => $validated['base_notes'],
            'concentration' => $validated['concentration'],
            'fragrance_gender' => $validated['fragrance_gender'],
            'age_group' => $validated['age_group'],
            'keyword' => $validated['keyword'],
            'description' => $validated['description'],
        ]);

        // save image file
        if($request->hasFile('filename')) {
            $storedFile = $request->file('filename')->store('products', 'public');

            VisualContent::create([
                'filename' => $storedFile,
                'alt_desc' => $validated['alt_desc'],
                'prod_id' => $product->prod_id,
                'user_id' => 1 // in the meantime hardcode it first, later it will take the user id of the logged in user
            ]);
        }


        return redirect()->route('adm-products.index');
    }

    public function show($id) {
        $product = Product::with('visual_contents')->findOrFail($id);

        $data = [
            'product' => $product,
        ];

        return view('admin.p_adm_show', $data);
    }

    public function buyerShow($id) {
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

    public function edit($id) {
        $product = Product::with('visual_contents')
                    ->findOrFail($id);

        $data = [
            'product' => $product,
        ];

        return view('admin.p_adm_edit', $data);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'prod_name' => 'required|min:3',
            'price' => 'required|numeric',
            'top_notes' => 'required|min:3',
            'mid_notes' => 'required|min:3',
            'base_notes' => 'required|min:3',
            'concentration' => 'required|min:3',
            'fragrance_gender' => 'required|min:3',
            'age_group' => 'required|min:3',
            'keyword' => 'required|min:3',
            'description' => 'required|min:3',
            'filename' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:1024',
            'alt_desc' => 'nullable|min:3',
        ]);

        if ($request->hasFile('filename')) {
            $storedFile = $request->file('filename')->store('products', 'public');
        
            VisualContent::where('prod_id', $id)->update([
                'filename' => $storedFile,
                'alt_desc' => $validated['alt_desc'],
            ]);
        } elseif (!empty($validated['alt_desc'])) {
            VisualContent::where('prod_id', $id)->update([
                'alt_desc' => $validated['alt_desc'],
            ]);
        }
    
        unset($validated['filename']);
        unset($validated['alt_desc']);
        Product::where('prod_id', $id)->update($validated);

        return redirect()->route('adm-products.index');
    }

    public function listing(Request $request, $id) {
        $validated = $request->validate([
            'is_listed' => 'required|boolean',
        ]);

        Product::where('prod_id', $id)->update($validated);

        return back();
    }

    public function destroy($id) {
        Product::where('prod_id', $id)->delete();
        
        return back();
    }
}
