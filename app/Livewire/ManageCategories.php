<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class ManageCategories extends Component
{
    public $showCategoryModal = false;
    public $categories;
    public $allCategories;
    public $categoryName;
    public $selectedParent = null;
    public $name;
    public $parent_id;

    public $selectedCategory;

    
    public function categorySelected($categoryId)
{
    // Update the selected category ID
/*     \Log::info('Selected Category ID: ' . $this->selectedCategory);
 */
    $this->selectedCategory = $categoryId;
}

    public function openCategoryModal()
    {
        $this->reset('categoryName'); // Clear input on open
        $this->showCategoryModal = true;
    }

    public function closeCategoryModal()
    {
        $this->showCategoryModal = false;
    }

    public function mount()
    {
        $this->categories = Category::with('children')->get();
        $this->allCategories = Category::pluck('name', 'id')->all();
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.manage-categories', compact('categories'));
    }
    public function storeCategory()
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
    }
    public function refreshCategories()
{
    // Reload the categories data
    $this->categories = Category::with('children')->get();
}


}
