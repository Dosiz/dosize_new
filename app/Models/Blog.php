<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
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

    public function blog_comment()
    {
        return $this->hasMany(BlogComment::class);
    }

    public function blogs_comment_reply()
    {
        return $this->hasMany(BlogsCommentHasReply::class);
    }
}
