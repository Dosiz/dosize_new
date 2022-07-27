<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brandsubcategories()
    {
        return $this->hasMany(BrandsHasSubCategory::class);
    }

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
