<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandMessage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function brandprofile()
    {
        return $this->belongsTo(BrandProfile::class,'brand_profile_id','id');
    }

    public function brand_message_city()
    {
        return $this->hasMany(BrandsMessageHasCity::class);
    }

}
