<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Photo extends Model
{
    use HasFactory;
    public Image $image;
    public  $path;

    /**
     * saves $image along the Photo->$path
    * @return void ;
     */
    public function add(){
        $this->image->Image::save($this->path);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
   
}
