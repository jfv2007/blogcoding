<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class ListCategories extends Component
{

    public function deleteCategory($id)
    {

        /*  dd($id); */

        $categorie = Category::where('id', $id)->first();
        $categorie->delete();


        session()->flash('message', 'Category has been deleted successfully');
    }

    public function render()
    {
        $categories = Category::get();

        return view('livewire.admin.categories.list-categories', ['categories'=>$categories])
        ->layout('layouts.app');
    }
}
