<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Blog;
use App\Models\Product;

class RecomendedProduct extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function recomended_product()
    {
        return $this->belongsTo(Product::class,'recomended_product_id','id');
    }

    public function recomended_blog()
    {
        return $this->belongsTo(Blog::class,'recomended_product_id','id');
    }
}
