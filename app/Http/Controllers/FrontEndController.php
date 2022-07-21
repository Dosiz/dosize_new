<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Product;
use App\Models\Blog;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\ProductsHasCity;
use App\Models\BlogsHasCity;
use App\Models\BrandProfile;
use App\Models\BrandsHasSubCategory;
use App\Models\BrandsHasAddress;
use App\Models\BrandsHasCity;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Models\BrandMessage;
use App\Models\BrandsMessageHasCity;

class FrontEndController extends Controller
{
    public function landing_page($id = 5)
    {
        $cities = City::get();
        $products = DB::table('products_has_cities')
        ->Join('products', 'products.id', '=', 'products_has_cities.product_id')
        ->Join('brand_profiles', 'brand_profiles.id', '=', 'products.brand_profile_id')
        ->select('products.*','brand_profiles.brand_name')
        ->where('products.discount_price' , null)
        ->where('products_has_cities.city_id','5')
        ->get();
        // $discount_products = Product::with('brandprofile')->where('city_id', '5')->where('discount_price', '!=' , 'null')->get();
        $discount_products = DB::table('products_has_cities')
        ->Join('products', 'products.id', '=', 'products_has_cities.product_id')
        ->Join('brand_profiles', 'brand_profiles.id', '=', 'products.brand_profile_id')
        ->select('products.*','brand_profiles.brand_name')
        ->where('products.discount_price','!=', null)
        ->where('products_has_cities.city_id','5')
        ->get();

        $brand_messages = DB::table('brands_message_has_cities')
        ->Join('brand_messages', 'brand_messages.id', '=', 'brands_message_has_cities.brand_message_id')
        ->Join('brand_profiles', 'brand_profiles.id', '=', 'brand_messages.brand_profile_id')
        ->select('brand_messages.*','brand_profiles.brand_image')
        ->where('brands_message_has_cities.city_id','5')
        ->get();
        // dd($brand_messages);
        $brands_recomanded_products = BrandProfile::with('recommended_product','product_city')->whereHas('product_city', function ($q) {
            $q->where('city_id', '5');
        })
        ->get();
        
        $blogs = Blog::with('brandprofile')->where('status', '1')->get();

        $products_by_categories = Category::with('product','brandprofile')
                    ->orderBy('category_order_id', 'ASC')
                    ->get();
        // dd($products_by_categories);
        return view('landing_page' , compact('cities','products','blogs','discount_products','brands_recomanded_products','products_by_categories','brand_messages'));
    }

    public function article_detail($blog_id)
    {
        $blog = Blog::with('brandprofile','category')->where('id',$blog_id)->first();
        $products = Product::with('brandprofile')->where('sub_category_id',$blog->sub_category_id)->get();
         // dd($blog->category->name);
        return view('frontend.article',compact('blog','products'));
    }  

    public function product_detail($product_id)
    {
        $product = Product::with('brandprofile','category')->where('id',$product_id)->first();
        $products = Product::with('brandprofile')->where('sub_category_id',$product->sub_category_id)->get();

        $blogs = Blog::with('brandprofile')->where('sub_category_id',$product->sub_category_id)->get();
        // dd($products);
        return view('frontend.product',compact('product','products','blogs'));
    }  
}
