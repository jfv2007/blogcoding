<?php

namespace App\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;

class LandingPosts extends Component
{
    public function render()
    {
        $posts = Post::orderby('id','desc')->paginate(6);

        return view('livewire.admin.posts.landing-posts', ['posts'=>$posts])
        ->layout('layouts.app');
    }
}
