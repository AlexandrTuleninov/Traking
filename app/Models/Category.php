<?php

namespace App\Models;


use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Category extends Model
{
    protected $guarded = [];  
    use HasFactory;
    
    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function add($data){
        $this->parsingData($data);
        $this->save();
    }

    /** 
    * @return Category
    **/
    private function parsingData($data){
        $this->name=$data['name'];
        $this->slug= Str::slug($data['name']);
        $this->content= $data['content'];
        $this->addPhoto($data);
        $this->url_image=$this->getUrlPhoto($data);
        return $this;
    } 
    
    public function addPhoto($data){
        $filename=(string)$this->slug.(string)'.' . (string)$data['image']->extension();
        $data['image']->move(Storage::path('/public/image/categories/').'origin/',$filename);  
    }

    public function getUrlPhoto($data){
        $filename=(string)$this->slug.(string)'.' . (string)$data['image']->extension();
        $path = '/public/image/categories/' . 'origin/' . $filename;
        return Storage::url($path);
    }
}