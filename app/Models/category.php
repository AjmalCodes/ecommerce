<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
'name' , 'slug' , 'status' , 'popular' , 'meta_title' , 'meta_keywords' , 'description' , 'image',
    ];

    // public function categories()
    // {
    //  return $this->hasMany(Category::class);
    // }

}
