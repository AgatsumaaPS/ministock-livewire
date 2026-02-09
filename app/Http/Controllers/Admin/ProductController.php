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

      public function show(Product $product)
      {
            $product->load('category');
            return view('admin.products.show', compact('product'));
      }

      public function store(Request $request)
      {
            $data = $request->validate([
                  'name' => 'required|string|max:255',
                  'description' => 'nullable|string',
                  'sku' => 'required|string|max:100|unique:products,sku',
                  'category_id' => 'required|exists:categories,id',
                  'stock' => 'required|integer|min:0',
                  'location' => 'nullable|string|max:255',
                  'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                  $image = $request->file('image');
                  $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                  $imagePath = $image->storeAs('products', $imageName, 'public');
                  $data['image_path'] = $imagePath;
            }

            $product = Product::create($data);

            // Log activity
            \App\Models\ActivityLog::create([
                'user_id' => auth()->id(),
                'action' => 'created',
                'model_type' => 'Product',
                'model_id' => $product->id,
                'model_name' => $product->name,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
      }

      public function edit(Product $product)
      {
            $categories = Category::orderBy('name')->get();
            return view('admin.products.edit', compact('product', 'categories'));
      }

      public function update(Request $request, Product $product)
      {
            $oldData = $product->only(['name', 'sku', 'stock', 'location']);
            
            $data = $request->validate([
                  'name' => 'required|string|max:255',
                  'description' => 'nullable|string',
                  'sku' => 'required|string|max:100|unique:products,sku,' . $product->id,
                  'category_id' => 'required|exists:categories,id',
                  'stock' => 'required|integer|min:0',
                  'location' => 'nullable|string|max:255',
                  'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                  // Delete old image if exists
                  if ($product->image_path && \Storage::disk('public')->exists($product->image_path)) {
                        \Storage::disk('public')->delete($product->image_path);
                  }
                  
                  $image = $request->file('image');
                  $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                  $imagePath = $image->storeAs('products', $imageName, 'public');
                  $data['image_path'] = $imagePath;
            }

            $product->update($data);

            // Log activity with changes
            $changes = [];
            foreach ($oldData as $key => $oldValue) {
                  if (isset($data[$key]) && $data[$key] != $oldValue) {
                        $changes[$key] = ['old' => $oldValue, 'new' => $data[$key]];
                  }
            }

            \App\Models\ActivityLog::create([
                'user_id' => auth()->id(),
                'action' => 'updated',
                'model_type' => 'Product',
                'model_id' => $product->id,
                'model_name' => $product->name,
                'changes' => $changes,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
      }

      public function destroy(Product $product)
      {
            $productName = $product->name;
            $productId = $product->id;
            
            // Delete image if exists
            if ($product->image_path && \Storage::disk('public')->exists($product->image_path)) {
                  \Storage::disk('public')->delete($product->image_path);
            }
            
            $product->delete();

            // Log activity
            \App\Models\ActivityLog::create([
                'user_id' => auth()->id(),
                'action' => 'deleted',
                'model_type' => 'Product',
                'model_id' => $productId,
                'model_name' => $productName,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);

            return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
      }
}
