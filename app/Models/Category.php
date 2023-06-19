<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];  
    use HasFactory;
    
    public function products(){
        return $this->hasMany(Product::class);
    }
    
    public function add(){
        Category::create(['parent_id'=>$this->parent_id,
        'name'=>$this->name,
        'content'=>$this->content,
        'slug'=>$this->slug,
        'image'=>$this,
    ]);
    return view('catalog.category', compact('this'));
    }
}
