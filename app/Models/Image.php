<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table= 'images';

    public $timestamps = false;

    protected $appends = [
        'image_url',
        'foto1_url'
    ];
    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {

            /* return Storage::disk('avatars')->url($this->avatar); */
          /*   return  asset('storage/imagenes/'.$this->image); */
            return  asset('imagenes/'.$this->image);
        }

        return asset('noimage.png');
    }

}
