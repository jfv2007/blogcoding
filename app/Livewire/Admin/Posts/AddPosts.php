<?php

namespace App\Livewire\Admin\Posts;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AddPosts extends Component
{
    use WithFileUploads;


    public $title, $images = [], $body;
    public $appointmentDate;
    public $appointmentDateInput;
    public $is_finished;
    public $slug;

    public $state = [];
    public $categorias = [];
    public $selectedCategoria = NULL;
    public $readyToLoad = false;
    public $centros;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function mount()
    {
        $this->categorias = Category::orderBy('slug', 'DESC')->get();
        $this->centros = Category::orderBy('slug', 'DESC')->get();
        /*  $date = Carbon::now();
        $date =$date->toDateTimeString();
        $this->appointmentDateInput= "hola"; */
        /* dd($date); */
    }

    /* public function getCategory()
    {

        $tags=[];
        if($search =$request->name) {
            $tags=Category::where('title', 'LIKE', "%$search%")->get();

        }
            return response()->json($tags);

    }  */

    public function updatePost()
    {
        /* dd('hola'); */
        dd($this->state['date']);
    }
    public function addPost()
    {   /* dd('hola'); */
        /*  dd($this->state['date']); */
        /* dd($this->selectedCategoria); */
        /*  dd($this->state['is_finished']); */
        if ($this->state['is_finished'] == true) {
            $this->is_finished = 1;
        } else {
            $this->is_finished = 0;
        }

        /* dd($this->is_finished); */

        $this->validate([
            'title' => 'required',
            'body'  => 'required',
        ]);


        $date = Carbon::now();
        $date = $date->toDateTimeString();

        $post = new Post();
        /* $validateDate['id_usuario'] = auth()->user()->id; */
        $post->user_id = auth()->user()->id;
        $post->title = $this->title;
        /* $post->imageurl='imagenes/default.jpeg'; */
        $post->body = $this->body;
        $post->slug = $this->slug;
        $post->published_at = $this->state['date'];
        $post->featured = $this->is_finished;
        $post->deleted_at = null;
        $post->created_at = $date;
        $post->updated_at = $date;

        $ruta = public_path("imagenes/");
        $imageName = Carbon::now()->timestamp . '.' . $this->images[0]->extension();
        copy($this->images[0]->getRealPath(), $ruta . $imageName);
        $post->imageurl = $imageName;

        $post->save();



        foreach ($this->images as $key => $image) {
            $pimage = new Image();
            $pimage->post_id = $post->id;

            $ruta = public_path("imagenes/");
            $imageName = Carbon::now()->timestamp . $key . '.' . $this->images[$key]->extension();
            /* $this->images[$key]->move($ruta,$imageName); */
            copy($this->images[$key]->getRealPath(), $ruta . $imageName);

            $pimage->image = $imageName;
            /* $post->image()->create(['image'=>$imageName]); */
            $pimage->save();
        }



        /*  foreach ($this->images as $key => $image) {
            $pimage = new Image();
            $pimage->post_id = $post->id;

            $imageName = Carbon::now()->timestamp . $key . '.' . $this->images[$key]->extension();
             $this->images[$key]->storeAs('public/imagenes',$imageName);

            $pimage->image = $imageName;
            $pimage->save();
        } */

        $this->title = '';
        $this->images = '';

        session()->flash('message', 'Product added successfully');
        return redirect()->route('admin.posts.add');
    }

    public function render()
    {
        return view('livewire.admin.posts.add-posts')
            ->layout('layouts.app');
    }
}
