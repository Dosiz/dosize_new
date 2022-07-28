<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class,'friend','id');
    }
    public function endusers()
    {
       return $this->belongsTo(User::class,'user','id'); 
    }
}
