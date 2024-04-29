<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class ListCategory extends Component
{
    protected $listeners = ['refreshCategories' => 'refreshData'];

    public function refreshData()
    {
        $this->categories = Category::where('parent_id', null)->get();

    }
   /*  public function deleteCategory($categoryId)
    {
        // Delete the category based on the ID
        //soft delete
        Category::find($categoryId)->delete();

        // Dispatch event to refresh categories
        $this->dispatch('refreshData');
    }
    public function openEditModal($categoryId)
    {
        $this->dispatch('openEditModal', $categoryId);
    } */

    public function render()
    {
        return view('livewire.list-category', [
            'categories' => Category::where('parent_id', null)->get(),
        ]);
    }
}
