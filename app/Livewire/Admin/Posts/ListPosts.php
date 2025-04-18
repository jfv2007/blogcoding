<?php

namespace App\Livewire\Admin\Posts;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ListPosts extends Component
{

    public function deletePost($id)
    {

        /* dd($this->id);
        $image = Image::findOrFail($this->IdBeingRemoved);
        dd($this->image);
        Storage::disk('imagenes')->delete($image->name);
 */
        $post = Post::where('id', $id)->first();
        $post->delete();
    /*     ($storage->allFiles(('livewire-tmp'))); */

        //Delete Multiple Images
        $images = Image::where('post_id', $id)->get();
        foreach($images as $image){

            $nombre =$image->image;
            $path = public_path('imagenes/' . $nombre);
            /* dd($path); */
             if (File::exists($path)) {
                 File::delete($path);
             }

            $image->delete();
            /* Storage::disk('imagenes')->delete($image->image); */
        }

        session()->flash('message', 'Post has been deleted successfully');
    }


    public function render()
    {
        $posts = Post::get();
        /* $image= Image */

        return view('livewire.admin.posts.list-posts', ['posts'=>$posts])
        ->layout('layouts.app');
    }
}
