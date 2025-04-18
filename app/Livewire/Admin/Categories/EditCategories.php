<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class EditCategories extends Component
{
    public $selectedColor = NULL;
    public $selectedbg = NULL;

    public $id_categoria, $title,$slug, $text_color, $bg_color;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }
    public function updateCategory()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required',
            'selectedColor' => 'required',
            'selectedbg' => 'required',

        ]);
        /* dd($this->id_categorie); */
        $categorie = Category::where('id', $this->id_categoria)->first();
        $categorie->title = $this->title;
        $categorie->slug = $this->slug;
        $categorie->text_color=$this->selectedColor;
        $categorie->bg_color =$this->selectedbg;
        $categorie->save();



        $this->title = '';
        $this->slug = '';

        session()->flash('message', 'Categories updated successfully');
        return redirect()->route('admin.categories');
    }


    public function mount($id)
    {
        /* dd($id); */
        $categorie=Category::where('id', $id)->first();
           /* dd($categorie); */
        $this->id_categoria = $categorie->id;
        $this->title = $categorie->title;
        $this->slug = $categorie->slug;
        $this->selectedColor = $categorie->text_color;
        $this->selectedbg = $categorie->bg_color;
    }


    public function render()
    {
       /*  dd($this->id);
 */
       /*  $categories = Category::where('id', $this->categorie_id)->get(); */
        /*  $categories = Category::where('id', $this->id)->get(); */
         /* $categories = Category::all(); */

        return view('livewire.admin.categories.edit-categories')
        ->layout('layouts.app');
    }
}
