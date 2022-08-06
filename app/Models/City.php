<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function brandcities()
    {
        return $this->hasMany(BrandsHasCity::class);
    }

    public function brandaddresses()
    {
        return $this->hasMany(BrandsHasAddress::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function brand_message_city()
    {
        return $this->hasMany(BrandsMessageHasCity::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_has_cities','city_id', 'product_id');
    }

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blogs_has_cities','city_id', 'blog_id');
    }
}
