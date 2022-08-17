<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandTimming extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'sat_thu_mor_open' => 'array',
        'sat_thu_mor_close' => 'array',
        'sat_thu_noon_open' => 'array',
        'sat_thu_noon_close' => 'array',
    ];

    public function BrandProfile()
    {
        return $this->hasMany(BrandProfile::class);
    }
}
