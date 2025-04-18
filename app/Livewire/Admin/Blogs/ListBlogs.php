<?php

namespace App\Livewire\Admin\Blogs;

use Livewire\Component;
use Livewire\WithFileUploads;

class ListBlogs extends Component
{
     use WithFileUploads;

    public $images=[];

    public function save()
    {
        $this->validate(([
            'images.*' => 'image|max:2024'
        ]));
        foreach($this->images as $image)
        {
            $image->store('/','imagenes');
        }
        session()->flash('message', 'Imagenes seccessfully updated');
    }

    public function render()
    {
        return view('livewire.admin.blogs.list-blogs')
            ->layout('layouts.app');
           /*  ->slot('content'); */
    }
}
