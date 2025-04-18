<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;

class AddCategories extends Component
{
    public $title, $slug;
    public $selectedColor = NULL;
    public $selectedbg = NULL;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function addCategories()
    {
          /* dd($this->selectedColor); */

        $this->validate([
            'title' =>'required',
            'slug'  =>'required',
            'selectedColor' => 'required',
            'selectedbg' => 'required',
        ]);


        $date = Carbon::now();
        $date =$date->toDateTimeString();

         $categorie = new Category();
       /*  Category::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'text_color' => $this->selectedColor,
            'bg_color' => $this->selectedbg,
            'created_at' => $date,
            'updated_at' => $date,


        ]);
 */
        $categorie->title = $this->title;
        $categorie->slug = $this->slug;
        $categorie->text_color =$this->selectedColor;
        $categorie->bg_color =$this->selectedbg;
        $categorie->created_at=$date;
        $categorie->updated_at=$date;

        $categorie->save();


        session()->flash('message', 'Categorie added successfully');
        return redirect()->route('admin.categories.add');

    }

    public function render()
    {
        return view('livewire.admin.categories.add-categories')
            ->layout('layouts.app');
    }
}
