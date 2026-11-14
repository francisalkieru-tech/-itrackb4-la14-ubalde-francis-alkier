<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');    
        $category = $request->query('category');
        $available = $request->query('available');

        $categories = Category::all();

        $query = Product::with('category');

        if ($search !== null && $search !== '') {
            $query->where('name', 'like', "%{$search}%");
        }

        if($category !== null && $category !== ''){
            $query->where('category_id', $category);
        }

        if ($available !== null && $available !== '') {
            $query->where('is_available', $available);
        }

        $sort = $request->query('sort', 'name');
        if (! in_array($sort, ['name', 'price', 'stock'])) {
            $sort = 'name';
        }

        $products = $query->orderBy($sort)->paginate(6)->withQueryString();

        return view('products.index', compact('products', 'categories', 'sort'));
    }
    
    //return view('products.index', ['products' => $this->products()]);

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|numeric|min:1|max:1000',
            'stock' => 'required|numeric|max:100',
            'category_id' => 'required|exists:categories,id'
        ]);
        $product = Product::create($validated);

        Log::info('Product saved', ['id' => $product->id, ]);
        return redirect()
        ->route('products.index')
        ->with('success', 'Product added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $categories = Category::all();
         return view('products.show', compact('product', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|numeric|min:1|max:1000',
            'stock' => 'required|numeric|max:100',
            'category_id' => 'required|exists:categories,id'
        ]);

        $product->update($validated);

        return redirect()
        ->route('products.index')
        ->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        abort_if($product->category->products()->count() === 1, 403);
        
        $product->delete();
        return redirect()->route('products.index');
    }
}


