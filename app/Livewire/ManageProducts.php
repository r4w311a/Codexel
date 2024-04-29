<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class ManageProducts extends Component
{
    public $showProductModal = false;
    public $products;
    public $allProducts;
    public $productName;

    
 

    public function openProductModal()
    {
        $this->reset('productName'); // Clear input on open
        $this->showProductModal = true;
    }

    public function closeProductModal()
    {
        $this->showProductModal = false;
    }

    public function mount()
    {
        // fetch categories

        // fetch products
        $this->products = Product::get();
    }

    public function render()
    {
        $categories = Category::with('children')->get();

        $products = Product::all();

        return view('livewire.manage-products', compact('products','categories'));
    }
    /* public function storeCategory()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create([
            'name' => $this->name,
            'parent_id' => $this->selectedCategory,
        ]);

        $this->closeCategoryModal();
        $this->dispatch('refreshCategories');
    } */
/*     public function refreshCategories()
{
    // Reload the categories data
    $this->categories = Category::with('children')->get();
} */


}
