<?php

namespace App\Http\Controllers\brand;

use App\Http\Controllers\Controller;
use App\Models\RecomendedBlog;
use Illuminate\Http\Request;
use App\Models\Product;
use Auth;
use DB;
use App\Models\Category;
use App\Models\User;
use App\Models\Blog;
use App\Models\SubCategory;
use App\Models\ProductsHasCity;
use App\Models\BrandProfile;
use App\Models\BrandsHasSubCategory;
use App\Models\BrandsHasAddress;
use App\Models\BrandsHasCity;
use App\Models\RecomendedProduct;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $brand_profile = BrandProfile::where('user_id',Auth::id())->first();
        $products = Product::with('category')->with('subcategory')->where('brand_profile_id',$brand_profile->id)->get();
        // dd($products);
        return view('brand.product.index', compact('products','brand_profile'));

    }

    public function create(Request $request)
    {
            $user_id = Auth::id();
            $brand_profile = BrandProfile::with('category')->where('user_id',$user_id)->first();
            $products = Product::where('brand_profile_id',$brand_profile->id)->get();
            $blogs = Blog::where('brand_profile_id',$brand_profile->id)->get();
            $sub_categories = BrandsHasSubCategory::with('subcategory')->where('brand_profile_id',$brand_profile->id)->get();
            $addresses = BrandsHasAddress::with('brandprofile')->with('city')->where('brand_profile_id',$brand_profile->id)->get();
            $brand_cities = BrandsHasCity::with('city')->where('brand_profile_id',$brand_profile->id)->get();
            if(count($brand_cities) <= 0)
            {
                $brand_cities = User::where('id',$user_id)->get();
            }
            // dd($brand_profile,$sub_categories,$brand_cities,$addresses);
            return view('brand.product.add', compact('brand_profile','sub_categories','addresses','brand_cities','products','blogs'));

    }




    public function show($id)
    {
        $product = Product::where('id',$id)->first();
        $brand_profile = BrandProfile::with('category')->where('user_id',Auth::id())->first();
        $product_cities = ProductsHasCity::with('city')->where('brand_profile_id',$brand_profile->id)->get();

        return view('brand.product.show', compact('product','brand_profile','product_cities'));
        
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[ 
            'image'=>'required', 
            'images'=>'required', 
            'name'=>'required', 
            'price'=>'required', 
            'category_id'=>'required', 
            'description'=>'required', 
            'profile_id'=>'required', 
            'sub_category_id'=>'required', 
            'city_id'=>'required', 

        ]);
        $product= new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        // if($request->discount_price)
        // {
        $product->discount_price = $request->discount_price;
        $product->sale_time = $request->sale_time;
        // }
        $product->brand_profile_id = $request->profile_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move('product/',$image_name);
            $product->image=$image_name;
        }

        $images = [];
        if($request->hasfile('images'))
        {
            foreach(($request->file('images')) as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move('product/', $name);
                $files[] = $name;
            }
            $product->images = json_encode($files);;

        }

        $product->save();

        if($request->product_id)
        {

            foreach($request->product_id as $product_id)
            {
                $recomended_products = new RecomendedProduct;
                $recomended_products->product_id = $product->id;
                $recomended_products->recomended_product_id = $product_id;
                $recomended_products->brand_profile_id = $request->profile_id;
                $recomended_products->type = 'product';
                $recomended_products->save();
            }
        }

        if($request->blog_id)
        {

            foreach($request->blog_id as $blog_id)
            {
                $recomended_blogs = new RecomendedProduct;
                $recomended_blogs->product_id = $product->id;
                $recomended_blogs->recomended_blog_id = $blog_id;
                $recomended_blogs->brand_profile_id = $request->profile_id;
                $recomended_blogs->type = 'blog';
                $recomended_blogs->save();
            }
        }

        ProductsHasCity::where('product_id',$product->id)->delete();

        foreach($request->city_id as $city_id)
        {
            // dd($address);
            $product_city= new ProductsHasCity;
            $product_city->brand_profile_id=$request->profile_id;
            $product_city->product_id = $product->id;
            $product_city->city_id = $city_id;
            $product_city->save();
        }
        return redirect('brand/product');
    }

    public function edit($id)
    {
        // try {
            $product = Product::where('id',$id)->first();
            $brand_profile = BrandProfile::with('category')->where('user_id',Auth::id())->first();
            $products = Product::where('brand_profile_id',$brand_profile->id)->get();
            $blogs = Blog::where('brand_profile_id',$brand_profile->id)->get();
            $recomended_products = RecomendedProduct::where([['product_id',$id],['brand_profile_id',$brand_profile->id],['type','product']])->get();
            $recommended_blogs = RecomendedProduct::where([['product_id',$id],['brand_profile_id',$brand_profile->id],['type','blog']])->get();
            $sub_categories = BrandsHasSubCategory::with('subcategory')->where('brand_profile_id',$brand_profile->id)->get();
            $addresses = BrandsHasAddress::with('brandprofile')->with('city')->where('brand_profile_id',$brand_profile->id)->get();
            $brand_cities = BrandsHasCity::with('city')->where('brand_profile_id',$brand_profile->id)->get();
            $product_cities = ProductsHasCity::with('city')->where('product_id',$id)->get();
            if(count($brand_cities) <= 0)
            {
                $brand_cities = User::where('id',Auth::id())->get();
            }
            // dd($product_cities);
            return view('brand.product.edit', compact('product','brand_profile','sub_categories','addresses','brand_cities','product_cities','recomended_products','recommended_blogs','products','blogs'));
        // } catch (\Exception $exception) {
        //     return Redirect::back();
        // }
    }

    public function update(Request $request,$id)
    {
        // dd($request->all());
        $user_id = Auth::id();
        $brand_profile = BrandProfile::where('user_id',$user_id)->first();
        $this->validate($request,[ 
            // 'image'=>'required', 
            'name'=>'required', 
            'price'=>'required', 
            'category_id'=>'required', 
            'description'=>'required', 
            'profile_id'=>'required', 
            'sub_category_id'=>'required', 
            'city_id'=>'required', 

        ]);
        $product= Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        // if($request->discount_price == null || $request->discount_price != null)
        // {
            // dd("inside loop");
            $product->discount_price = $request->discount_price;
            $product->sale_time = $request->sale_time;
        // }
        // dd("outside loop");
        $product->brand_profile_id = $request->profile_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move('product/',$image_name);
            $product->image=$image_name;
        }
        $images = [];
        if($request->hasfile('images'))
        {
            foreach(($request->file('images')) as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move('product/', $name);
                $files[] = $name;
            }
            $product->images = json_encode($files);;

        }
        $product->save();
        // dd($product->id);
        RecomendedProduct::where('product_id',$product->id)->delete();
        if($request->product_id)
        {
            foreach($request->product_id as $product_id)
            {
                $recomended_products = new RecomendedProduct;
                $recomended_products->product_id = $product->id;
                $recomended_products->recomended_product_id = $product_id;
                $recomended_products->brand_profile_id = $request->profile_id;
                $recomended_products->type = 'product';
                $recomended_products->save();
            }
        }

        if($request->blog_id)
        {
            foreach($request->blog_id as $blog_id)
            {
                $recomended_products = new RecomendedProduct;
                $recomended_products->product_id = $product->id;
                $recomended_products->recomended_product_id = $blog_id;
                $recomended_products->brand_profile_id = $request->profile_id;
                $recomended_products->type = 'blog';
                $recomended_products->save();
            }
        }

        ProductsHasCity::where('product_id',$id)->delete();

        foreach($request->city_id as $city_id)
        {
            // dd($address);
            $product_city= new ProductsHasCity;
            $product_city->brand_profile_id=$request->profile_id;
            $product_city->product_id = $product->id;
            $product_city->city_id = $city_id;
            $product_city->save();
        }
        return redirect('brand/product');
    }

    public function destroy(Request $request , $id)
    {
        // try {
                $filePath = Product::FindorFail($id);
                ProductsHasCity::where('product_id',$id)->delete();
                RecomendedProduct::where('product_id',$id)->delete();
                Product::FindorFail($id)->delete();
                
                @unlink(public_path()."/product/".$filePath->image );
               
                return redirect('brand/product');
        // } catch (\Exception $exception) {
        //     return Redirect::back();
        // }
        
    }

    public function update_brand_product(Request $request,$id)
    {
        
        $product= Product::find($id); 
        $product->status = $request->status;
        $product->save();

        return Redirect::back();
        
    }
}
