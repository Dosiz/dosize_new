<?php

namespace App\Http\Controllers\brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Product;
use Auth;
use DB;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\BlogsHasCity;
use App\Models\BrandProfile;
use App\Models\BrandsHasSubCategory;
use App\Models\BrandsHasAddress;
use App\Models\BrandsHasCity;  
use App\Models\RecomendedBlog;  
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
            $blogs = Blog::where('brand_profile_id',$brand_profile->id)->get();
            $products = Product::where('brand_profile_id',$brand_profile->id)->get();
            $addresses = BrandsHasAddress::with('brandprofile')->with('city')->where('brand_profile_id',$brand_profile->id)->get();
            $brand_cities = BrandsHasCity::with('city')->where('brand_profile_id',$brand_profile->id)->get();
            if(count($brand_cities) <= 0)
            {
                $brand_cities = User::where('id',$user_id)->get();
            }
            // dd($brand_cities);
            // dd($brand_profile,$sub_categories,$brand_cities,$addresses);
            return view('brand.blog.add', compact('brand_profile','sub_categories','addresses','brand_cities','blogs','products'));

    }




    public function show($id)
    {
        try {
            $blog = Blog::where('id',$id)->first();
            $brand_profile = BrandProfile::with('category')->where('user_id',Auth::id())->first();
            $blog_cities = BlogsHasCity::with('city')->where('brand_profile_id',$brand_profile->id)->where('blog_id',$id)->get();
            // dd($blog_cities);
            return view('brand.blog.show', compact('blog','brand_profile','blog_cities'));
        } catch (\Exception $exception) {
            return Redirect::back();
        }
    }

    public function store(Request $request)
    {
        // dd($request->all() , explode(",", $request->tags));
        $brand_profile = BrandProfile::where('user_id',Auth::id())->first();
        $this->validate($request,[ 
            'image'=>'required', 
            'images'=>'required', 
            'title'=>'required', 
            'sub_title'=>'required', 
            'category_id'=>'required', 
            'description'=>'required', 
            'profile_id'=>'required', 
            'sub_category_id'=>'required', 
            'city_id'=>'required', 
            'tags' => 'required',

        ]);
        $blog= new Blog;

        $blog->tags = $request->tags;

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

        $images = [];
        if($request->hasfile('images'))
        {
            foreach(($request->file('images')) as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move('blog/', $name);  
                $files[] = $name; 
            }
            $blog->images = json_encode($files);;
            
        }
        $blog->save();
        if($request->blog_id)
        {
            foreach($request->blog_id as $blog_id)
            {
                $recomended_blogs = new RecomendedBlog;
                $recomended_blogs->blog_id = $blog->id;
                $recomended_blogs->recomended_blog_id = $blog_id;
                $recomended_blogs->brand_profile_id = $request->profile_id;
                $recomended_blogs->type = 'blog';
                $recomended_blogs->save();
            }
        }

        if($request->product_id)
        {
            foreach($request->product_id as $product_id)
            {
                $recomended_products = new RecomendedBlog;
                $recomended_products->blog_id = $blog->id;
                $recomended_products->recomended_blog_id = $product_id;
                $recomended_products->brand_profile_id = $request->profile_id;
                $recomended_products->type = 'product';
                $recomended_products->save();
            }
        }


        foreach($request->city_id as $city_id)
        {
            // dd($address);
            $blog_city= new BlogsHasCity;
            $blog_city->brand_profile_id=$request->profile_id;
            $blog_city->blog_id = $blog->id;
            $blog_city->city_id = $city_id;
            $blog_city->save();
        }
        return redirect('/brand/blog');
    }

    public function edit($id)
    {
        // try {
            $blog = Blog::where('id',$id)->first();
            $brand_profile = BrandProfile::with('category')->where('user_id',Auth::id())->first();
            $blogs = Blog::where('brand_profile_id',$brand_profile->id)->get()->except($blog->id);
            $products = Product::where('brand_profile_id',$brand_profile->id)->get();
            $recomended_blogs = RecomendedBlog::where([['brand_profile_id',$brand_profile->id],['type','blog']])->get();
            $recomended_products = RecomendedBlog::where([['brand_profile_id',$brand_profile->id],['type','product']])->get();
            $sub_categories = BrandsHasSubCategory::with('subcategory')->where('brand_profile_id',$brand_profile->id)->get();
            $addresses = BrandsHasAddress::with('brandprofile')->with('city')->where('brand_profile_id',$brand_profile->id)->get();
            $brand_cities = BrandsHasCity::with('city')->where('brand_profile_id',$brand_profile->id)->get();
            $blog_cities = BlogsHasCity::with('city')->where('brand_profile_id',$brand_profile->id)->where('blog_id',$id)->get();

            // dd($blog_cities , $brand_cities);
            if(count($brand_cities) <= 0)
            {
                $brand_cities = User::where('id',Auth::id())->get();
            }
            return view('brand.blog.edit', compact('blog','brand_profile','sub_categories','addresses','brand_cities','blog_cities','blogs','products','recomended_blogs','recomended_products'));
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
            'tags' => 'required',

        ]);
        $blog= Blog::find($blog);
        $blog->tags = $request->tags;
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

        $images = [];
        if($request->hasfile('images'))
        {
            // dd($request->file('images'));
            foreach(($request->file('images')) as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move('blog/', $name);  
                $files[] = $name; 
            }
            $blog->images = json_encode($files);;
            
        }
        
        $blog->save();

        RecomendedBlog::where('blog_id',$blog->id)->delete();

        if($request->blog_id){
            foreach($request->blog_id as $blog_id)
            {
                $recomended_blogs = new RecomendedBlog;
                $recomended_blogs->blog_id = $blog->id;
                $recomended_blogs->recomended_blog_id = $blog_id;
                $recomended_blogs->brand_profile_id = $request->profile_id;
                $recomended_blogs->type = 'blog';
                $recomended_blogs->save();
            }
        }

        if($request->product_id)
        {
            foreach($request->product_id as $product_id)
            {
                $recomended_products = new RecomendedBlog;
                $recomended_products->blog_id = $blog->id;
                $recomended_products->recomended_blog_id = $product_id;
                $recomended_products->brand_profile_id = $request->profile_id;
                $recomended_products->type = 'product';
                $recomended_products->save();
            }
        }

        BlogsHasCity::where('blog_id',$blog->id)->delete();

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
                RecomendedBlog::where('blog_id',$id)->delete();
                Blog::FindorFail($id)->delete();
                
                @unlink(public_path()."/blog/".$filePath->image );
               
                return Redirect::back();        
        // } catch (\Exception $exception) {
        //     return Redirect::back();
        // }
        
    }
}
