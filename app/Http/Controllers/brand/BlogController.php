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
            return view('blog.show_blog', compact('blog'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
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
        try {
            $blog = Blog::where('id',$id)->first();
            $user_id = $blog->user_id;
            $brand_profile = BrandProfile::where('user_id',$user_id)->first();
            $categories = Category::get();
            $product_categories = ProductCategory::where('brand_profile_id',$brand_profile->id)->get();
            $category = Category::where('id',$brand_profile->category_id)->first();
            return view('blog.edit_blog', compact('blog','categories','product_categories','category'));
        } catch (\Exception $exception) {
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }

    public function update(Request $request,$blog)
    {
        // dd($request->all());
        $user_id = Auth::id();
        $brand_profile = BrandProfile::where('user_id',$user_id)->first();
        $this->validate($request,[ 
            'name'=>'required',
            'title'=>'required', 
            'sub_title'=>'required', 
            'category_id'=>'required', 
            'description'=>'required', 
            //'short_description'=>'required', 

        ]);
        try {
            $blog= Blog::find($blog);
            $images=$blog->images;
            // dd($request->all());
            $new_array = array();
            if(isset($request->preloaded)){
                foreach($request->preloaded as $img)
                {
                     $new_array[]= $img;
                }
            }
            $blog->name = $request->name;
            $blog->title = $request->title;
            $blog->sub_title = $request->sub_title;
            $blog->user_id = $user_id;
            $blog->product_category_id = $request->product_category_id;
            $blog->category_id = $brand_profile->category_id;
            $blog->description = $request->description;
            //$blog->short_description = $request->short_description;
            if ($request->file('image')) {
                $filePath = HelperFunctions::blogImagePath();
                $image = HelperFunctions::saveFile(null, $request->file('image'), $filePath);
                $blog->image = $image;
            }
            if ($request->file('images')) {
                $filePath = HelperFunctions::blogImagePath();
                $files = $request->file('images');
                foreach ($files  as $key => $file) {
                    $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                    
                    $new_array[] =  $imagename ;
                }
            }
           
            
            $blog->images =  $new_array;
            $blog->save();
            toastSuccess('Successfully Updated');
            return redirect('dashboard/blog');
        } catch (\Exception $exception) {
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }

    public function destroy(Request $request , $id)
    {
        try {
                $filePath = Blog::FindorFail($id);
                Blog::FindorFail($id)->delete();
                foreach($filePath->images as $image)
                {
                    @unlink($image);
                }
                @unlink($filePath->image);
               
            toastr()->success('Successfully Deleted');
            return back();
        } catch (\Exception $exception) {
            toastError($exception->getMessage());
            return Redirect::back();
        }
        
    }
}
