<?php

namespace App\Livewire\Admin\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BoostrapPosts extends Component
{
    public function render()
    {

        $user=Auth::user();
        /* $posts=Post::all(); */
        $posts = Post::where ('user_id', $user->id)->orderBy('id','desc')->get();
        return view('livewire.admin.posts.boostrap-posts',['users'=>$user,'posts'=>$posts])
        ->layout('layouts.app');

        /* return view('livewire.admin.posts.boostrap-posts')
                ->layout('layouts.app'); */
    }
}
