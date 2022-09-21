<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecomendedBlog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function blog()
    {
        return $this->belongsTo(Blog::class,'blog_id','id');
    }

    public function recomended_blog()
    {
        return $this->belongsTo(Blog::class,'recomended_blog_id','id');
    }

    public function recommended_product()
    {
        return $this->belongsTo(Product::class,'recomended_product_id','id');
    }
}
