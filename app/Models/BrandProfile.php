<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandProfile extends Model
{
    use HasFactory;

    protected $guarded = [];
    
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
    
}
