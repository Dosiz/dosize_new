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
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use DB;
use Auth;
use App\Models\BrandMessage;  
use App\Models\BlogComment;  
use App\Models\ProductComment;  
use App\Models\BrandsMessageHasCity; 
use App\Models\RecomendedProduct;  
use App\Models\RecomendedBlog;   
use App\Models\BlogsCommentHasReply;    
use App\Models\Like;    
use App\Models\Bookmark;
use App\Models\Message;
use App\Models\Friend;       
use App\Models\ContactUs;    

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

        // dd($brands_recomanded_products);
        
        $blogs = $blogs = DB::table('blogs_has_cities')
        ->Join('blogs', 'blogs.id', '=', 'blogs_has_cities.blog_id')
        // ->Join('categories', 'categories.id', '=', 'blogs.category_id')
        ->Join('brand_profiles', 'brand_profiles.id', '=', 'blogs.brand_profile_id')
        ->LeftJoin('likes', 'likes.blog_id', '=', 'blogs.id')
        ->select('blogs.*','brand_profiles.brand_name',DB::raw('count(likes.id) as totallikes'))
        ->where('blogs_has_cities.city_id','5')
        // ->where('categories.id',$category_id)
        ->get();

        // dd($blogs);

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
        $cities = City::get();
        $blog_likes =Like::where('blog_id',$blog_id)->where('name','Article')->get();
        $blog_bookmarks =Bookmark::where('blog_id',$blog_id)->where('name','Article')->get();
        $user = User::where('id',Auth::id())->first();
        if($user)
        {
            $blog_like =Like::where('blog_id',$blog_id)->where('user_id',$user->id)->where('name','Article')->first();
            $blog_bookmark =Bookmark::where('blog_id',$blog_id)->where('user_id',$user->id)->where('name','Article')->first();
            return view('frontend.article',compact('cities','blog','products','categories','blog_comments','recomanded_blogs','blog_like','blog_likes','blog_bookmarks','blog_bookmark'));
        }
        else{
            $blog_bookmark = null;
            $blog_like = null;
            return view('frontend.article',compact('cities','blog','products','categories','blog_comments','recomanded_blogs','blog_likes','blog_bookmarks','blog_bookmark','blog_like'));
        }
        
        // dd($recomanded_blogs);
        
    }  

    public function product_detail($product_id)
    {
        $product = Product::with('brandprofile','category')->where('id',$product_id)->first();
        $products = Product::with('brandprofile')->where('sub_category_id',$product->sub_category_id)->get();
        $categories = Category::get();
        $recomanded_products = RecomendedProduct::with('recomended_product')->where('product_id',$product_id)->get();
        $product_comments = ProductComment::where('product_id',$product_id)->orderBy('id','DESC')->get();
        $cities = City::get();

        $product_likes =Like::where('product_id',$product_id)->where('name','Product')->get();
        $product_bookmarks =Bookmark::where('product_id',$product_id)->where('name','Product')->get();
        $user = User::where('id',Auth::id())->first();
        if($user)
        {
            $product_like =Like::where('product_id',$product_id)->where('user_id',$user->id)->where('name','Product')->first();
            $product_bookmark =Bookmark::where('product_id',$product_id)->where('user_id',$user->id)->where('name','Product')->first();
            return view('frontend.product',compact('cities','product','products','recomanded_products','categories','product_comments','product_likes','product_like','product_bookmarks','product_bookmark'));
        }
        else{
            $product_like = null;
            $product_bookmark = null;
            return view('frontend.product',compact('cities','product','products','recomanded_products','categories','product_comments','product_likes','product_like','product_bookmarks','product_bookmark'));
        }
        // dd($recomanded_products);   
        
    }  

    public function store_blog_comment(Request $request)    
    {
        // dd($request->all());
        $user_id = Auth::id();
        $user = User::where('id',Auth::id())->first();
        $this->validate($request,[ 
            'comment'=>'required', 

        ]);
        $blog_comment = new BlogComment;
        
        if($request->name == 'on')
        {
            $blog_comment->name = 'anonymous';
            $blog_user_name = 'anonymous';
        }
        else
        {
            $blog_comment->user_id = $user_id;
            $blog_user_name = $user->name;
        }
        $blog_comment->comment = $request->comment;
        $blog_comment->blog_id  = $request->blog_id;
        $blog_comment->save();


       
        return response()->json(['success'=>'Blog Comment saved successfully' , 'comment' => $request->comment,'name'=>$blog_user_name]);
    }

    public function store_blog_comment_reply(Request $request)    
    {
        // dd($request->all());
        $user_id = Auth::id();
        $user = User::where('id',Auth::id())->first();
        $this->validate($request,[ 
            'comment'=>'required', 

        ]);
        $blog_comment_reply = new BlogsCommentHasReply;
        
        if($request->name == 'on')
        {
            $blog_comment_reply->name = 'anonymous';
        }
        else
        {
            $blog_comment_reply->user_id = $user_id;
        }
        $blog_comment_reply->comment = $request->comment;
        $blog_comment_reply->blog_comment_id = $request->blog_comment_id;
        $blog_comment_reply->blog_id  = $request->blog_id;
        $blog_comment_reply->save();


       
        return Redirect::back();
    }

    

    public function store_product_comment(Request $request)    
    {
        // dd($request->all());
        $user_id = Auth::id();
        $user = User::where('id',Auth::id())->first();
        $this->validate($request,[ 
            'comment'=>'required', 

        ]);
        $product_comment = new ProductComment;
        
        if($request->name == 'on')
        {
            $product_comment->name = 'anonymous';
            $product_user_name = 'anonymous';
        }
        else
        {
            $product_comment->user_id = $user_id;
            $product_user_name = $user->name;
        }
        $product_comment->comment = $request->comment;
        $product_comment->product_id  = $request->product_id;
        $product_comment->save();
       
        return response()->json(['success'=>'Product Comment saved successfully', 'comment' => $request->comment,'name'=>$product_user_name]);
    }

    public function brand_profile($brand_id)
    {
        $cities = City::get();
        $brand_profile = BrandProfile::with('category','user')->where('id',$brand_id)->first();
        $brand_products = Product::where('brand_profile_id',$brand_id)->get();
        $blog_1 = Blog::where('brand_profile_id',$brand_profile->id)->where('status',1)->first();
        $blog_2 = Blog::where('brand_profile_id',$brand_profile->id)->where('status',1)->skip(1)->first();
        $blog_3 = Blog::where('brand_profile_id',$brand_profile->id)->where('status',1)->skip(2)->first();
        $categories = Category::get();

        // dd($blog_1,$blog_2,$blog_3);
        return view('frontend.brand_profile',compact('brand_profile','brand_products','blog_1','blog_2','blog_3','cities','categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[ 
            'f_name'=>'required', 
            'l_name'=>'required', 
            'email'=>'required', 
            'phone'=>'required|numeric|size:11',  
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
        return view('frontend.brand_articles',compact('blogs','brand_profile','cities','categories'));
    }

    public function products($brand_id)
    {
        $cities = City::get();
        $categories = Category::get();
        $brand_profile = BrandProfile::where('id',$brand_id)->first();
        $products = Product::where('brand_profile_id',$brand_id)->where('status',1)->get();
        return view('frontend.brand_products',compact('products','brand_profile','cities','categories'));
    }

    public function store_blog_comment_like(Request $request)
    {
        // dd($request->all());
        $user_id = Auth::id();
        $blog = Like::where('user_id',$user_id)->where('blog_id',$request->blog_id)->where('name','Article')->first();
        // dd($blog);
        if($blog)
        {
            Like::where('id',$blog->id)->where('name','Article')->delete();
            return response()->json(['success'=>'Blog Like Removed']);
        }
        else{
            $blog_like= new Like;
            $blog_like->name = 'Article';
            $blog_like->blog_id = $request->blog_id;
            $blog_like->user_id = $user_id;
            $blog_like->save();
            return response()->json(['success'=>'Blog Like successfully']);
        }
        // return view('frontend.brand_products',compact('products','brand_profile','cities','categories'));
    }

    public function store_blog_bookmark(Request $request)
    {
        // dd($request->all());
        $user_id = Auth::id();
        $blog = Bookmark::where('user_id',$user_id)->where('blog_id',$request->blog_id)->where('name','Article')->first();
        // dd($blog);
        if($blog)
        {
            Bookmark::where('id',$blog->id)->where('name','Article')->delete();
            return response()->json(['success'=>'Blog Bookmark Removed']);
        }
        else{
            $blog_bookmark= new Bookmark;
            $blog_bookmark->name = 'Article';
            $blog_bookmark->blog_id = $request->blog_id;
            $blog_bookmark->user_id = $user_id;
            $blog_bookmark->save();
            return response()->json(['success'=>'Blog Bookmark Successfully']);
        }
        // return view('frontend.brand_products',compact('products','brand_profile','cities','categories'));
    }

    public function store_product_comment_like(Request $request)
    {
        // dd($request->all());
        $user_id = Auth::id();
        $product = Like::where('user_id',$user_id)->where('product_id',$request->product_id)->where('name','Product')->first();
        // dd($product);
        if($product)
        {
            Like::where('id',$product->id)->where('name','Product')->delete();
            return response()->json(['success'=>'Product Like Removed']);
        }
        else{
            $product_like= new Like;
            $product_like->name = 'Product';
            $product_like->product_id = $request->product_id;
            $product_like->user_id = $user_id;
            $product_like->save();
            return response()->json(['success'=>'Product Like successfully']);
        }
        // return view('frontend.brand_products',compact('products','brand_profile','cities','categories'));
    }

    public function store_product_bookmark(Request $request)
    {
        // dd($request->all());
        $user_id = Auth::id();
        $product = Bookmark::where('user_id',$user_id)->where('product_id',$request->product_id)->where('name','Article')->first();
        // dd($product);
        if($product)
        {
            Bookmark::where('id',$product->id)->where('name','Product')->delete();
            return response()->json(['success'=>'Product Bookmark Removed']);
        }
        else{
            $product_bookmark= new Bookmark;
            $product_bookmark->name = 'Product';
            $product_bookmark->product_id = $request->product_id;
            $product_bookmark->user_id = $user_id;
            $product_bookmark->save();
            return response()->json(['success'=>'Product Bookmark Successfully']);
        }
        // return view('frontend.brand_products',compact('products','brand_profile','cities','categories'));
    }

    public function messages()
    {
        $cities = City::get();
        $categories = Category::get();
        $id=$_GET['id'];
        if(Auth::user()->hasRole('Brand'))
        {
            return view('brand.message.index',compact('id','cities','categories'));
        }
        else{
            return view('frontend.messages',compact('id','cities','categories'));
        }
        
    }

    public function bookmarks()
    {
        $categories = Category::get();
        $cities = City::get();
        $likes =Like::with('blog')->where('user_id' , Auth::id())->get();
        $bookmarks =Bookmark::with('blog')->where('user_id' , Auth::id())->get();
        // dd($likes);
        return view('frontend.bookmark',compact('cities','categories','likes','bookmarks'));
        
        // dd($recomanded_blogs);
        
    } 
    
    public function category($category_id,$city_id = 5)
    {
        $categories = Category::get();
        $cities = City::get();

        $discount_products = DB::table('products_has_cities')
        ->Join('products', 'products.id', '=', 'products_has_cities.product_id')
        ->Join('categories', 'categories.id', '=', 'products.category_id')
        ->Join('brand_profiles', 'brand_profiles.id', '=', 'products.brand_profile_id')
        ->select('products.*','brand_profiles.brand_name')
        ->where('products_has_cities.city_id',$city_id)
        ->where('categories.id',$category_id)
        ->where('products.discount_price','!=', null)
        ->get();

        $products = DB::table('products_has_cities')
        ->Join('products', 'products.id', '=', 'products_has_cities.product_id')
        ->Join('categories', 'categories.id', '=', 'products.category_id')
        ->Join('brand_profiles', 'brand_profiles.id', '=', 'products.brand_profile_id')
        ->select('products.*','brand_profiles.brand_name')
        ->where('products_has_cities.city_id',$city_id)
        ->where('categories.id',$category_id)
        ->where('products.discount_price','=', null)
        ->get();
        // dd($products);

        $blogs = DB::table('blogs_has_cities')
        ->Join('blogs', 'blogs.id', '=', 'blogs_has_cities.blog_id')
        ->Join('categories', 'categories.id', '=', 'blogs.category_id')
        ->Join('brand_profiles', 'brand_profiles.id', '=', 'blogs.brand_profile_id')
        ->Join('likes', 'likes.blog_id', '=', 'blogs.id')
        ->select('blogs.*','brand_profiles.brand_name',DB::raw('count(likes.id) as totallikes'))
        ->where('blogs_has_cities.city_id',$city_id)
        ->where('categories.id',$category_id)
        ->limit(6)
        ->get();
        // dd($blogs);

        $brands_recomanded_products = DB::table('products_has_cities')
        ->Join('products', 'products.id', '=', 'products_has_cities.product_id')
        ->Join('categories', 'categories.id', '=', 'products.category_id')
        ->Join('recomended_products', 'recomended_products.product_id', '=', 'products.id')
        ->Join('brand_profiles', 'brand_profiles.id', '=', 'products.brand_profile_id')
        ->select('products.*','brand_profiles.brand_name')
        ->where('products_has_cities.city_id',$city_id)
        ->where('categories.id',$category_id)
        ->where('products.discount_price','==', null)
        ->get();

        // dd($products);
        return view('frontend.city_category',compact('cities','categories','discount_products','products','brands_recomanded_products','blogs'));
    }

    public function category_article_detail($category_id,$city_id = 2)
    {
        $categories = Category::get();
        $cities = City::get();

        $blogs = DB::table('blogs_has_cities')
        ->Join('blogs', 'blogs.id', '=', 'blogs_has_cities.blog_id')
        ->Join('categories', 'categories.id', '=', 'blogs.category_id')
        ->Join('brand_profiles', 'brand_profiles.id', '=', 'blogs.brand_profile_id')
        ->Join('likes', 'likes.blog_id', '=', 'blogs.id')
        ->select('blogs.*','brand_profiles.brand_name',DB::raw('count(likes.id) as totallikes'))
        ->where('blogs_has_cities.city_id',$city_id)
        ->where('categories.id',$category_id)
        ->get();

        // dd($products);
        return view('frontend.city_category_article_detail',compact('cities','categories','blogs'));
    }

    public function city_brands($city_id)
    {
        $categories = Category::get();
        $cities = City::get();

        $city_brands = DB::table('brands_has_cities')
        ->Join('brand_profiles', 'brand_profiles.id', '=', 'brands_has_cities.brand_profile_id')
        ->select('brand_profiles.*')
        ->where('brands_has_cities.city_id',$city_id)
        ->get();
        // dd($city_brands);
        return view('frontend.city_brands',compact('cities','categories','city_brands'));
    }

    public function user_messages()
    {
        $categories = Category::get();
        $cities = City::get();
        return view('frontend.messages',compact('cities','categories'));
    }

}
