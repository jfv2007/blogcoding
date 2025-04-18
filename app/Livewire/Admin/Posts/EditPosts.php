<?php

namespace App\Livewire\Admin\Posts;

use App\Models\Image;
use App\Models\Post;
use Carbon\Carbon;
use Hamcrest\Type\IsBoolean;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class EditPosts extends Component
{
    use WithFileUploads;
    public $title, $images = [];
    public $post_id, $body;
    public $is_finished;
    public $state = [];
    public $slug;

    public $appointmentDateInput;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'body' => 'required',
        ]);
    }
    public function updatePost()
    {
       /*  $this->publicarDate;
           $this->state = $this->publicarDate->toArray(); */

            /* dd($this->post_id); */
            /*  dd($this->state['date']); */
           /* dd($this->slug);
 */
        if ($this->state['featured'] == true) {
            $this->is_finished = 1;
        } else {
            $this->is_finished = 0;
        }
        /* dd($this->is_finished); */


        /* dd( $this->is_finished); */
        $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = Post::where('id', $this->post_id)->first();
        $post->title = $this->title;
        $post->slug = $this->slug;
        $post->body = $this->body;
         $post->updated_at =$this->state['date'];
        $post->featured=$this->is_finished;

        $post->save();



        if ($this->images != '') {
            foreach ($this->images as $key => $image) {
                $pimage = new Image();
                $pimage->post_id = $post->id;
                $ruta =public_path("imagenes/");
                $imageName = Carbon::now()->timestamp . $key . '.' . $this->images[$key]->extension();
                /* $this->images[$key]->storeAs('public/imagenes', $imageName); */
                /* $this->images[$key]->storeAs('all', $imageName); */
                copy($this->images[$key]->getRealPath(),$ruta.$imageName);

                $pimage->image = $imageName; /* Es el campo donde esta grabado la imagen */
                $pimage->save();
            }
        }

        $this->images = '';

        session()->flash('message', 'Post updated successfully');
        return redirect()->route('admin.posts');
    }


    public function mount($id)
    {
        $post = Post::where('id', $id)->first();

        $this->state = $post->toArray();

         /*  dd( $this->state); */

         if ($this->state['featured'] == 1) {
            $this->is_finished = true;
        } else {
            $this->is_finished = false;
        }
        /* dd($this->is_finished); */

        /* d($post['published_at']); */
        /* $date = Carbon::now();
        $date =$date->toDateTimeString();
        $this->publicarDate=$date; */

        $this->post_id = $post->id;
        $this->title = $post->title;
        $this->slug =$post->slug;
        $this->body = $post->body;
        $this->state['date']=$post['published_at'];
        $this->state['featured']=$this->is_finished;
    }

    public function deleteImage($id)
    {
        /* dd($id); */
        $image = Image::where('id', $id)->first();
        /*   dd($image->image); */

        $nombre =$image->image;
       /*  dd($nombre); */
        $path = public_path('imagenes/' . $nombre);

       /* dd($path); */
        if (File::exists($path)) {
            File::delete($path);
        }
        /* $sucursal->imagen = null; */
        $image->delete();

        session()->flash('message', 'Product image deleted successfully');
    }

    protected function cleanupOldUploads()
    {

        $storage = Storage::disk('local');
        /*  dd($storage->allFiles(('livewire-tmp')));   vez los archivos que estan en la carpeta*/

        foreach ($storage->allFiles('livewire-tmp') as $filePathname) {
            $yesterdaysStamp = now()->subSecond(4)->timestamp;
            if ($yesterdaysStamp > $storage->lastModified($filePathname)) {
                $storage->delete($filePathname);
            }
        }
    }

    public function render()
    {
        $postImages = Image::where('post_id', $this->post_id)->get();
        return view('livewire.admin.posts.edit-posts', ['postImages' => $postImages])
            ->layout('layouts.app');
    }
}
