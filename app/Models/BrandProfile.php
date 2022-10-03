<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandProfile extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'website_primary_images' => 'array',
    ];

    public function brandaddresses()
    {
        return $this->hasMany(BrandsHasAddress::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function product_city()
    {
        return $this->hasMany(ProductsHasCity::class);
    }

    public function recommended_product()
    {
        return $this->hasMany(Product::class)->where('discount_price',null)->limit(2);
    }

    public function brand_message()
    {
        return $this->hasMany(BrandMessage::class);
    }

    public function brand_message_city()
    {
        return $this->hasMany(BrandsMessageHasCity::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
