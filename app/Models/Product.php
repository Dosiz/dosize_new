<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function brandprofile()
    {
        return $this->belongsTo(BrandProfile::class,'brand_profile_id','id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id','id');
    }

    public function product_comment()
    {
        return $this->hasMany(ProductComment::class)->whereNull('parent_id');
    }

    public function recomended_product()
    {
        return $this->hasMany(RecomendedProduct::class);
    }

    public function cities()
    {
        return $this->belongsToMany(City::class, 'products_has_cities','product_id', 'city_id');
    }

    public function points()
    {
        return $this->morphMany('App\Point', 'pointable');
    }

}
