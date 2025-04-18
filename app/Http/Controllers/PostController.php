<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index()
    {
            return view(
                'posts.index',
                [
                    'categories'=>Category::whereHas('posts', function ($query) {
                        $query->published();
                    })->take(10)->get()
                ]
            );
    }

    public function show(Post $post)
    {
        return view(
            'posts.show',
            [
                'post' => $post
            ]
        );
    }

}
