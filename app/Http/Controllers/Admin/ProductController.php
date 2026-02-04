<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
      public function index(Request $request)
      {
            $query = Product::with('category')->latest();

            if ($search = $request->input('search')) {
                  $query->where(function($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%")
                          ->orWhere('sku', 'like', "%{$search}%")
                          ->orWhere('location', 'like', "%{$search}%");
                  });
            }

            $products = $query->paginate(20)->withQueryString();

            return view('admin.products.index', compact('products'));
      }

      public function create()
      {
            $categories = Category::orderBy('name')->get();
            return view('admin.products.create', compact('categories'));
      }

      public function store(Request $request)
      {
            $data = $request->validate([
                  'name' => 'required|string|max:255',
                  'sku' => 'required|string|max:100|unique:products,sku',
                  'category_id' => 'required|exists:categories,id',
                  'stock' => 'required|integer|min:0',
                  'location' => 'nullable|string|max:255',
            ]);

            Product::create($data);

            return redirect()->route('admin.products.index')->with('success', 'Product created.');
      }

      public function edit(Product $product)
      {
            $categories = Category::orderBy('name')->get();
            return view('admin.products.edit', compact('product', 'categories'));
      }

      public function update(Request $request, Product $product)
      {
            $data = $request->validate([
                  'name' => 'required|string|max:255',
                  'sku' => 'required|string|max:100|unique:products,sku,' . $product->id,
                  'category_id' => 'required|exists:categories,id',
                  'stock' => 'required|integer|min:0',
                  'location' => 'nullable|string|max:255',
            ]);

            $product->update($data);

            return redirect()->route('admin.products.index')->with('success', 'Product updated.');
      }

      public function destroy(Product $product)
      {
            $product->delete();

            return redirect()->route('admin.products.index')->with('success', 'Product deleted.');
      }
}
