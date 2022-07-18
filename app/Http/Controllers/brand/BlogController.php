<?php

namespace App\Http\Controllers\brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Auth;
use DB;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\BlogsHasCity;
use App\Models\BrandProfile;
use App\Models\BrandsHasSubCategory;
use App\Models\BrandsHasAddress;
use App\Models\BrandsHasCity;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $brand_profile = BrandProfile::where('user_id',Auth::id())->first();
        $blogs = Blog::with('category')->with('subcategory')->where('brand_profile_id',$brand_profile->id)->get();
        // dd($blogs);
        return view('brand.blog.index', compact('blogs','brand_profile'));
        
    }      

    public function create(Request $request)
    {
            $user_id = Auth::id();
            $brand_profile = BrandProfile::with('category')->where('user_id',$user_id)->first();
            $sub_categories = BrandsHasSubCategory::with('subcategory')->where('brand_profile_id',$brand_profile->id)->get();
            $addresses = BrandsHasAddress::with('brandprofile')->with('city')->where('brand_profile_id',$brand_profile->id)->get();
            $brand_cities = BrandsHasCity::with('city')->where('brand_profile_id',$brand_profile->id)->get();
            // dd($brand_profile,$sub_categories,$brand_cities,$addresses);
            return view('brand.blog.add', compact('brand_profile','sub_categories','addresses','brand_cities'));
        
    }

    


    public function show($id)
    {
        try {
            $blog = Blog::where('id',$id)->first();
            $brand_profile = BrandProfile::with('category')->where('user_id',Auth::id())->first();
            $blog_cities = BlogsHasCity::with('city')->where('brand_profile_id',$brand_profile->id)->get();

            return view('brand.blog.show', compact('blog','brand_profile','blog_cities'));
        } catch (\Exception $exception) {
            return Redirect::back();
        }
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[ 
            'image'=>'required', 
            'title'=>'required', 
            'sub_title'=>'required', 
            'category_id'=>'required', 
            'description'=>'required', 
            'profile_id'=>'required', 
            'sub_category_id'=>'required', 
            'city_id'=>'required', 

        ]);
        $blog= new Blog;
        $blog->title = $request->title;
        $blog->sub_title = $request->sub_title;
        $blog->brand_profile_id = $request->profile_id;
        $blog->sub_category_id = $request->sub_category_id;
        $blog->category_id = $request->category_id;
        $blog->description = $request->description;
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move('blog/',$image_name);
            $blog->image=$image_name;
        }
        $blog->save();

        BlogsHasCity::where('brand_profile_id',$request->profile_id)->delete();
        
        foreach($request->city_id as $city_id)
        {
            // dd($address);
            $blog_city= new BlogsHasCity;
            $blog_city->brand_profile_id=$request->profile_id;
            $blog_city->blog_id = $blog->id;
            $blog_city->city_id = $city_id;
            $blog_city->save();
        }
        return redirect('brand/blog');
    }

    public function edit($id)
    {
        // try {
            $blog = Blog::where('id',$id)->first();
            $brand_profile = BrandProfile::with('category')->where('user_id',Auth::id())->first();
            $sub_categories = BrandsHasSubCategory::with('subcategory')->where('brand_profile_id',$brand_profile->id)->get();
            $addresses = BrandsHasAddress::with('brandprofile')->with('city')->where('brand_profile_id',$brand_profile->id)->get();
            $brand_cities = BrandsHasCity::with('city')->where('brand_profile_id',$brand_profile->id)->get();
            $blog_cities = BlogsHasCity::with('city')->where('brand_profile_id',$brand_profile->id)->get();
            // dd($blog_cities);
            return view('brand.blog.edit', compact('blog','brand_profile','sub_categories','addresses','brand_cities','blog_cities'));
        // } catch (\Exception $exception) {
        //     return Redirect::back();
        // }
    }

    public function update(Request $request,$blog)
    {
        // dd($request->all());
        $user_id = Auth::id();
        $brand_profile = BrandProfile::where('user_id',$user_id)->first();
        $this->validate($request,[ 
            'title'=>'required', 
            'sub_title'=>'required', 
            'category_id'=>'required', 
            'description'=>'required', 
            'profile_id'=>'required', 
            'sub_category_id'=>'required', 
            'city_id'=>'required', 

        ]);
        $blog= Blog::find($blog);
        $blog->title = $request->title;
        $blog->sub_title = $request->sub_title;
        $blog->brand_profile_id = $request->profile_id;
        $blog->sub_category_id = $request->sub_category_id;
        $blog->category_id = $request->category_id;
        $blog->description = $request->description;
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move('blog/',$image_name);
            $blog->image=$image_name;
        }
        $blog->save();

        BlogsHasCity::where('blog_id',$blog)->delete();
        
        foreach($request->city_id as $city_id)
        {
            // dd($address);
            $blog_city= new BlogsHasCity;
            $blog_city->brand_profile_id=$request->profile_id;
            $blog_city->blog_id = $blog->id;
            $blog_city->city_id = $city_id;
            $blog_city->save();
        }
        return redirect('brand/blog');
    }

    public function destroy(Request $request , $id)
    {
        // try {
                $filePath = Blog::FindorFail($id);
                BlogsHasCity::where('blog_id',$id)->delete();
                Blog::FindorFail($id)->delete();
                
                @unlink(public_path()."/blog/".$filePath->image );
               
                return Redirect::back();
        // } catch (\Exception $exception) {
        //     return Redirect::back();
        // }
        
    }
}
