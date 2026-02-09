<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->orderBy('name')->paginate(20);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        $category = Category::create($data);

        // Log activity
        \App\Models\ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'created',
            'model_type' => 'Category',
            'model_id' => $category->id,
            'model_name' => $category->name,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $oldName = $category->name;
        
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update($data);

        // Log activity
        \App\Models\ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'updated',
            'model_type' => 'Category',
            'model_id' => $category->id,
            'model_name' => $category->name,
            'changes' => ['name' => ['old' => $oldName, 'new' => $category->name]],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        $categoryName = $category->name;
        $categoryId = $category->id;

        if ($category->products()->count() > 0) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Kategori tidak dapat dihapus karena masih memiliki produk.');
        }

        $category->delete();

        // Log activity
        \App\Models\ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'deleted',
            'model_type' => 'Category',
            'model_id' => $categoryId,
            'model_name' => $categoryName,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
