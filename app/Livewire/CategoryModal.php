<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryModal extends Component
{
    
    public $showCategoryModal = false;
   /*  public $categories;
    public $categoryName; */

    /* public function openCategoryModal()
    {
        $this->reset('categoryName'); // Clear input on open
        $this->showCategoryModal = true;
    }

    public function closeCategoryModal()
    {
        $this->showCategoryModal = false;
    } */
        public function render()
    {
        $categories = Category::all();

        return view('livewire.manage-categories', compact('categories'));
    }
}
