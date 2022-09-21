<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsHasCity extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function brandprofile()
    {
        return $this->belongsTo(BrandProfile::class,'brand_profile_id','id');
    }

    public function city()
    {
        return $this->belongsTo(City::class,'city_id','id');
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
