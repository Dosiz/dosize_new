<?php

namespace App\Http\Controllers\brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Auth;
use DB;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductsHasCity;
use App\Models\BrandProfile;
use App\Models\BrandsHasSubCategory;
use App\Models\BrandsHasAddress;
use App\Models\BrandsHasCity;
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
            $sub_categories = BrandsHasSubCategory::with('subcategory')->where('brand_profile_id',$brand_profile->id)->get();
            $addresses = BrandsHasAddress::with('brandprofile')->with('city')->where('brand_profile_id',$brand_profile->id)->get();
            $brand_cities = BrandsHasCity::with('city')->where('brand_profile_id',$brand_profile->id)->get();
            // dd($brand_profile,$sub_categories,$brand_cities,$addresses);
            return view('brand.product.add', compact('brand_profile','sub_categories','addresses','brand_cities'));
        
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
        if($request->discount_price)
        {
            $product->discount_price = $request->discount_price; 
            $product->sale_time = $request->sale_time; 
        }
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
        $product->save();

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
            $sub_categories = BrandsHasSubCategory::with('subcategory')->where('brand_profile_id',$brand_profile->id)->get();
            $addresses = BrandsHasAddress::with('brandprofile')->with('city')->where('brand_profile_id',$brand_profile->id)->get();
            $brand_cities = BrandsHasCity::with('city')->where('brand_profile_id',$brand_profile->id)->get();
            $product_cities = ProductsHasCity::with('city')->where('product_id',$id)->get();
            // dd($product_cities);
            return view('brand.product.edit', compact('product','brand_profile','sub_categories','addresses','brand_cities','product_cities'));
        // } catch (\Exception $exception) {
        //     return Redirect::back();
        // }
    }

    public function update(Request $request,$id)
    {
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
        if($request->discount_price)
        {
            $product->discount_price = $request->discount_price; 
            $product->sale_time = $request->sale_time;
        }
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
        $product->save();

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
                Product::FindorFail($id)->delete();
                
                @unlink(public_path()."/product/".$filePath->image );
               
                return redirect('brand/product');
        // } catch (\Exception $exception) {
        //     return Redirect::back();
        // }
        
    }
}
