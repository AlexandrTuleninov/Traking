<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Photo extends Model
{
    use HasFactory;

    public function addPhoto($data , ){
        $filename=(string)$this->slug.(string)'.' . (string)$data['image']->extension();
        $data['image']->move(Storage::path('/public/image/categories/').'origin/',$filename);  
    }

    public function getUrlPhoto($data){
        $filename=(string)$this->slug.(string)'.' . (string)$data['image']->extension();
        $path = '/public/image/categories/' . 'origin/' . $filename;
        return Storage::url($path);
    }
}
