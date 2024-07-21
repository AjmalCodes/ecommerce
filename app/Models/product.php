<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'cate_id',
'name' , 'slug' , 'qty','selling_price', 'original_price','status' , 'popular' , 'meta_title' , 'meta_keywords' , 'description' , 'image',
    ];
    
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
