<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryManager extends Component
{
    use WithPagination;

    public $name = '';
    public $editingId = null;
    public $isEditing = false;
    public $perPage = 10;

    protected $rules = [
        'name' => 'required|string|max:255|unique:categories,name',
    ];

    protected $messages = [
        'name.required' => 'Nama kategori wajib diisi',
        'name.unique' => 'Kategori sudah ada',
    ];

    public function createCategory()
    {
        $this->validate();

        Category::create(['name' => $this->name]);

        $this->resetForm();
        $this->dispatchBrowserEvent('toast', [
            'message' => 'Kategori berhasil ditambahkan',
            'type' => 'success'
        ]);
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        $this->editingId = $id;
        $this->name = $category->name;
        $this->isEditing = true;
    }

    public function updateCategory()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $this->editingId
        ]);

        $category = Category::find($this->editingId);
        $category->update(['name' => $this->name]);

        $this->resetForm();
        $this->dispatchBrowserEvent('toast', [
            'message' => 'Kategori berhasil diupdate',
            'type' => 'success'
        ]);
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        
        if ($category->products->count() > 0) {
            $this->dispatchBrowserEvent('toast', [
                'message' => 'Tidak bisa menghapus kategori yang masih memiliki produk',
                'type' => 'error'
            ]);
            return;
        }

        $categoryName = $category->name;
        $category->delete();

        $this->dispatchBrowserEvent('toast', [
            'message' => "Kategori '$categoryName' berhasil dihapus",
            'type' => 'success'
        ]);
    }

    public function resetForm()
    {
        $this->reset(['name', 'editingId']);
        $this->isEditing = false;
        $this->resetValidation();
    }

    public function render()
    {
        $categories = Category::withCount('products')
            ->orderBy('name')
            ->paginate($this->perPage);

        return view('livewire.category-manager', [
            'categories' => $categories,
        ]);
    }
}