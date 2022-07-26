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
use Auth;
use App\Models\BrandMessage;  
use App\Models\BlogComment;  
use App\Models\ProductComment;  
use App\Models\BrandsMessageHasCity; 
use App\Models\RecomendedProduct;  
use App\Models\RecomendedBlog;  

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

        $categories = Category::get();
        
        // dd($categories);
        return view('landing_page' , compact('categories','cities','products','blogs','discount_products','brands_recomanded_products','products_by_categories','brand_messages'));
    }

    public function article_detail($blog_id)
    {
        $blog = Blog::with('brandprofile','category')->where('id',$blog_id)->first();
        $products = Product::with('brandprofile')->where('sub_category_id',$blog->sub_category_id)->get();
        $categories = Category::get();
        $blog_comments = BlogComment::where('blog_id',$blog->id)->orderBy('id','DESC')->get();
        $recomanded_blogs = RecomendedBlog::with('recomended_blog')->where('blog_id',$blog_id)->get();
        // dd($recomanded_blogs);
        return view('frontend.article',compact('blog','products','categories','blog_comments','recomanded_blogs'));
    }  

    public function product_detail($product_id)
    {
        $product = Product::with('brandprofile','category')->where('id',$product_id)->first();
        $products = Product::with('brandprofile')->where('sub_category_id',$product->sub_category_id)->get();
        $categories = Category::get();
        $recomanded_products = RecomendedProduct::with('recomended_product')->where('product_id',$product_id)->get();
        $product_comments = ProductComment::where('product_id',$product_id)->orderBy('id','DESC')->get();
        // dd($recomanded_products);    
        return view('frontend.product',compact('product','products','recomanded_products','categories','product_comments'));
    }  

    public function store_blog_comment(Request $request)    
    {
        // dd($request->all());
        $user_id = Auth::id();
        $this->validate($request,[ 
            'comment'=>'required', 

        ]);
        $blog_comment = new BlogComment;
        
        if($request->name == 'on')
        {
            $blog_comment->name = 'anonymous';
        }
        elseif($user_id)
        {
            $blog_comment->user_id = $user_id;
        }
        else
        {
            $blog_comment->name = 'anonymous';
        }
        $blog_comment->comment = $request->comment;
        $blog_comment->blog_id  = $request->blog_id;
        $blog_comment->save();
       
        return response()->json(['success'=>'Blog Comment saved successfully']);
    }

    public function store_product_comment(Request $request)    
    {
        // dd($request->all());
        $user_id = Auth::id();
        $this->validate($request,[ 
            'comment'=>'required', 

        ]);
        $product_comment = new ProductComment;
        
        if($request->name == 'on')
        {
            $product_comment->name = 'anonymous';
        }
        elseif($user_id)
        {
            $product_comment->user_id = $user_id;
        }
        else
        {
            $product_comment->name = 'anonymous';
        }
        $product_comment->comment = $request->comment;
        $product_comment->product_id  = $request->product_id;
        $product_comment->save();
       
        return response()->json(['success'=>'Product Comment saved successfully']);
    }

    public function brand_profile($brand_id)
    {
        $cities = City::get();
        $brand_profile = BrandProfile::with('category','user')->where('id',$brand_id)->first();
        $brand_products = Product::where('brand_profile_id',$brand_id)->get();
        $blog_1 = Blog::where('brand_profile_id',$brand_profile->id)->where('status',1)->first();
        $blog_2 = Blog::where('brand_profile_id',$brand_profile->id)->where('status',1)->skip(1)->first();
        $blog_3 = Blog::where('brand_profile_id',$brand_profile->id)->where('status',1)->skip(2)->first();

        // dd($blog_1,$blog_2,$blog_3);
        return view('frontend.brand_profile',compact('brand_profile','brand_products','blog_1','blog_2','blog_3','cities'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[ 
            'f_name'=>'required', 
            'l_name'=>'required', 
            'email'=>'required', 
            'phone'=>'required',  
            'subject'=>'required',  
        ]);
        try {
        $contact_us= new ContactUs;
        $contact_us->f_name = $request->f_name;
        $contact_us->l_name = $request->l_name;
        $contact_us->email = $request->email;
        $contact_us->phone = $request->phone;
        $contact_us->subject = $request->subject;
        $contact_us->brand_profile_id = $request->id;
        $contact_us->save();
            return Redirect::back();
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            return Redirect::back();
        }
    }

    public function articles($brand_id)
    {
        $cities = City::get();
        $categories = Category::get();
        $brand_profile = BrandProfile::where('id',$brand_id)->first();
        $blogs = Blog::where('brand_profile_id',$brand_id)->where('status',1)->get();
        return view('frontend.articles',compact('blogs','brand_profile','cities','categories'));
    }

}
