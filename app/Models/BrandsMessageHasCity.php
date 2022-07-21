<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandsMessageHasCity extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class,'city_id','id');
    }

    public function brandprofile()
    {
        return $this->belongsTo(BrandProfile::class,'brand_profile_id','id');
    }

    public function brand_message()
    {
        return $this->belongsTo(BrandMessage::class,'brand_message_id','id');
    }
}
