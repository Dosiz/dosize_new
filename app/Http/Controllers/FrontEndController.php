<?php

namespace App\Http\Controllers;

use App\Helpers\PointsHelper;
use App\Models\Point;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Models\BrandMessage;
use App\Models\BlogComment;
use App\Models\ProductComment;
use App\Models\BrandsMessageHasCity;
use App\Models\RecomendedProduct;
use App\Models\RecomendedBlog;
use App\Models\Like;
use App\Models\Bookmark;
use App\Models\Message;
use App\Models\Friend;       
use App\Models\ContactUs;     
use App\Models\Subscriber;   
use App\Models\AdminProduct;  
use App\Models\AdminProductOrder;   
use App\Models\BrandTimming;  
use Session;
use Illuminate\Support\Facades\Route;
use App\Helpers\Helpers; 

class FrontEndController extends Controller
{
    public function dfg()
    {
        dd("sdssd");
        return view('index');
    }
    public function landing_page()
    {
        // dd(Auth::user()->role('User'));
        $city_id = Helpers::city_id();
        // dd($city_id);
        $cities = City::get();
        $products = DB::table('products_has_cities')
        ->Join('products', 'products.id', '=', 'products_has_cities.product_id')
        // ->Join('product_comments', 'product_comments.product_id', '=', 'products.id')
        ->Join('brand_profiles', 'brand_profiles.id', '=', 'products.brand_profile_id')
        ->select('products.*','brand_profiles.brand_name','brand_profiles.short_name')
        ->where('products.discount_price' , null)
        ->where('products_has_cities.city_id',$city_id)
        ->orderBy('id', 'DESC')
        ->get();
        //  dd($products);
        // $discount_products = Product::with('brandprofile')->where('city_id', '5')->where('discount_price', '!=' , 'null')->get();
        $discount_products = DB::table('products_has_cities')
        ->Join('products', 'products.id', '=', 'products_has_cities.product_id')
        ->Join('brand_profiles', 'brand_profiles.id', '=', 'products.brand_profile_id')
        ->select('products.*','brand_profiles.brand_name','brand_profiles.short_name')
        ->where('products.discount_price','!=', null)
        ->where('products.sale_time','!=', null)
        ->where('products_has_cities.city_id',$city_id)
        ->orderBy('id', 'DESC')
        ->get();


        $brand_messages = DB::table('brands_message_has_cities')
        ->Join('brand_messages', 'brand_messages.id', '=', 'brands_message_has_cities.brand_message_id')
        ->Join('brand_profiles', 'brand_profiles.id', '=', 'brand_messages.brand_profile_id')
        ->select('brand_messages.*','brand_profiles.brand_image')
        ->where('brands_message_has_cities.city_id',$city_id)
        ->get();
        $brands_recomanded_products = BrandProfile::with('recommended_product.product_comment','product_city')->whereHas('product_city', function ($q) use ($city_id){
            $q->where('city_id',$city_id);
        })
        ->get();

        $blogs = DB::table('blogs_has_cities')
        ->Join('blogs', 'blogs.id', '=', 'blogs_has_cities.blog_id')
        // ->Join('categories', 'categories.id', '=', 'blogs.category_id')
        ->Join('brand_profiles', 'brand_profiles.id', '=', 'blogs.brand_profile_id')

        // ->leftJoin('likes', 'likes.blog_id', '=', 'blogs.id')
        ->select('blogs.*'
        ,'brand_profiles.brand_name','brand_profiles.short_name'
        // ,DB::raw('count(likes.id) as totallikes')
        )
        ->where('blogs_has_cities.city_id',$city_id)
        ->where('blogs.status',1)
        ->take(3)
        ->orderBy('id', 'DESC')
        // ->where('categories.id',$category_id)
        ->get();


        // dd($blogs);

        $products_by_categories = Category::with('product','brandprofile')->orderBy('category_order_id', 'ASC')->get();
        // dd($products_by_categories);

        $p_city = City::with('products','blogs')->find($city_id);
        // dd($p_city->blogs->groupBy('category_id'),$p_city->products->groupBy('category_id'));
        // foreach ($p_city->products->groupBy('category_id') as $key=>$product_categories){
        //     echo $product_categories;
        //     foreach ($p_city->blogs->groupBy('category_id') as $key=>$product_categories)
        //     {
        //         echo $product_categories;
        //     }
        // }
        // die();
            // dd($b_city->products->groupBy('category_id'));
            // dd($b_city->blogs->groupBy('category_id'));

        $categories = Category::get();

        // dd($categories);
        return view('landing_page' , compact('p_city','categories','cities','products','blogs','discount_products','brands_recomanded_products','products_by_categories','brand_messages'));
    }

    public function article_detail($blog_id)
    {
        $blog = Blog::with('brandprofile','category','cities')->where('id',$blog_id)->first();
        $products = Product::with('brandprofile','product_comment')->where('sub_category_id',$blog->sub_category_id)->get();
        $categories = Category::get();
        $blog_comments = BlogComment::where('blog_id',$blog->id)->where('parent_id',null)->where('status','1')->orderBy('id', 'DESC')->get();
        $recomanded_blogs = RecomendedBlog::with('recomended_blog')->where([['blog_id',$blog_id],['type','blog']])->take(3)->get();
        $recommended_products = RecomendedBlog::with('recommended_product')->where([['blog_id',$blog_id],['type','product']])->get();

        // dd($recommended_products);
        $cities = City::get();
        $blog_likes =Like::where('blog_id',$blog_id)->where('name','Article')->get();
        $blog_bookmarks =Bookmark::where('blog_id',$blog_id)->where('name','Article')->get();
        $user = User::where('id',Auth::id())->first();

        // dd($blog);
        if($user)
        {
            $chk_subscriber=Subscriber::where('email',$user->email)->first();
            $blog_like =Like::where('blog_id',$blog_id)->where('user_id',$user->id)->where('name','Article')->first();
            $blog_bookmark =Bookmark::where('blog_id',$blog_id)->where('user_id',$user->id)->where('name','Article')->first();
            // dd($blog_comment_reply);
            return view('frontend.article',compact('cities','chk_subscriber','blog','products','categories','blog_comments','recomanded_blogs','recommended_products','blog_like','blog_likes','blog_bookmarks','blog_bookmark'));
        }
        else{
            $blog_bookmark = null;
            $blog_like = null;
            $chk_subscriber = null;
            return view('frontend.article',compact('cities','chk_subscriber','blog','products','categories','blog_comments','recomanded_blogs','recommended_products','blog_likes','blog_bookmarks','blog_bookmark','blog_like'));
        }

        // dd($recomanded_blogs);

    }

    public function brand_article_detail($blog_id)
    {
        $brand_id = Helpers::profile_id();
        // dd($brand_id);
        if($brand_id != null)
        {
        $brand_profile = BrandProfile::with('brandaddresses','category','user')->where('id',$brand_id)->first();
        }
        else{
            $brand_profile = null; 
        }
        $blog = Blog::with('brandprofile','category','cities')->where('id',$blog_id)->first();
        $products = Product::with('brandprofile','product_comment')->where('sub_category_id',$blog->sub_category_id)->get();
        $categories = Category::get();
        $blog_comments = BlogComment::where('blog_id',$blog->id)->where('parent_id',null)->where('status','1')->orderBy('id', 'DESC')->get();
        $recomanded_blogs = RecomendedBlog::with('recomended_blog')->where([['blog_id',$blog_id],['type','blog']])->get();
        $recommended_products = RecomendedBlog::with('recommended_product')->where([['blog_id',$blog_id],['type','product']])->get();

        // dd($recommended_products);
        $cities = City::get();
        $blog_likes =Like::where('blog_id',$blog_id)->where('name','Article')->get();
        $blog_bookmarks =Bookmark::where('blog_id',$blog_id)->where('name','Article')->get();
        $user = User::where('id',Auth::id())->first();

        // dd($blog);
        if($user)
        {
            $chk_subscriber=Subscriber::where('email',$user->email)->first();
            $blog_like =Like::where('blog_id',$blog_id)->where('user_id',$user->id)->where('name','Article')->first();
            $blog_bookmark =Bookmark::where('blog_id',$blog_id)->where('user_id',$user->id)->where('name','Article')->first();
            // dd($blog_comment_reply);
            return view('frontend.article',compact('cities','chk_subscriber','blog','products','categories','blog_comments','recomanded_blogs','recommended_products','blog_like','blog_likes','blog_bookmarks','blog_bookmark','brand_profile'));
        }
        else{
            $blog_bookmark = null;
            $blog_like = null;
            $chk_subscriber = null;
            return view('frontend.brand_article',compact('cities','chk_subscriber','blog','products','categories','blog_comments','recomanded_blogs','recommended_products','blog_likes','blog_bookmarks','blog_bookmark','blog_like','brand_profile'));
        }

        // dd($recomanded_blogs);

    }

    public function product_detail($product_id)
    {
        $product = Product::with('brandprofile','category','cities')->where('id',$product_id)->first();
        // dd($product);
        $products = Product::with('brandprofile','product_comment')->where('sub_category_id',$product->sub_category_id)->get();
        $categories = Category::get();
        // dd($products);
        $recomanded_products = RecomendedProduct::with('recomended_product')->where([['product_id',$product_id],['type','product']])->get();
        $recomanded_blogs = RecomendedProduct::with('recomended_blog')->where([['product_id',$product_id],['type','blog']])->get();
        $product_comments = ProductComment::where('product_id',$product_id)->where('parent_id',null)->where('status','1')->orderBy('id', 'DESC')->get();
        // dd($recomanded_blogs,$recomanded_products);
        // $product_ratings = ProductComment::where('product_id',$product_id)->where('parent_id',null)->where('rating', '!=' ,'null')->orderBy('id', 'DESC')->get();
        $product_ratings = ProductComment::select(['product_comments.*',DB::raw('avg(product_comments.rating) as avgrate'),DB::raw('count(product_comments.id) as count_rating')])
        ->groupBy('product_comments.product_id')
        ->orderBy('avgrate', 'Desc')
        // ->where('product_comments.parent_id',null)
        ->where('product_comments.rating','!=',null)
        // ->limit(10)
        ->get();
        // dd($product_ratings);
        $cities = City::get();

        $product_likes =Like::where('product_id',$product_id)->where('name','Product')->get();
        $product_bookmarks =Bookmark::where('product_id',$product_id)->where('name','Product')->get();
        $user = User::where('id',Auth::id())->first();

        if($user)
        {
            $chk_subscriber=Subscriber::where('email',$user->email)->first();
            $product_like =Like::where('product_id',$product_id)->where('user_id',$user->id)->where('name','Product')->first();
            $product_bookmark =Bookmark::where('product_id',$product_id)->where('user_id',$user->id)->where('name','Product')->first();
            // dd($product_like);
            return view('frontend.product',compact('product_ratings','chk_subscriber','cities','product','products','recomanded_products','recomanded_blogs','categories','product_comments','product_likes','product_like','product_bookmarks','product_bookmark'));
        }
        else{
            $product_like = null;
            $product_bookmark = null;
            $chk_subscriber = null;
            return view('frontend.product',compact('product_ratings','chk_subscriber','cities','product','products','recomanded_products','recomanded_blogs','categories','product_comments','product_likes','product_like','product_bookmarks','product_bookmark'));
        }
        // dd($recomanded_products);

    }

    public function brand_product_detail($product_id)
    {
        $brand_id = Helpers::profile_id();
        // dd($brand_id);
        if($brand_id != null)
        {
        $brand_profile = BrandProfile::with('brandaddresses','category','user')->where('id',$brand_id)->first();
        }
        else{
            $brand_profile = null; 
        }
        $product = Product::with('brandprofile','category','cities')->where('id',$product_id)->first();
        // dd($product);
        $products = Product::with('brandprofile','product_comment')->where('sub_category_id',$product->sub_category_id)->get();
        $categories = Category::get();
        // dd($products);
        $recomanded_products = RecomendedProduct::with('recomended_product')->where([['product_id',$product_id],['type','product']])->get();
        $recomanded_blogs = RecomendedProduct::with('recomended_blog')->where([['product_id',$product_id],['type','blog']])->get();
        $product_comments = ProductComment::where('product_id',$product_id)->where('parent_id',null)->where('status','1')->orderBy('id', 'DESC')->get();
        // dd($recomanded_blogs,$recomanded_products);
        // $product_ratings = ProductComment::where('product_id',$product_id)->where('parent_id',null)->where('rating', '!=' ,'null')->orderBy('id', 'DESC')->get();
        $product_ratings = ProductComment::select(['product_comments.*',DB::raw('avg(product_comments.rating) as avgrate'),DB::raw('count(product_comments.id) as count_rating')])
        ->groupBy('product_comments.product_id')
        ->orderBy('avgrate', 'Desc')
        // ->where('product_comments.parent_id',null)
        ->where('product_comments.rating','!=',null)
        // ->limit(10)
        ->get();
        // dd($product_ratings);
        $cities = City::get();

        $product_likes =Like::where('product_id',$product_id)->where('name','Product')->get();
        $product_bookmarks =Bookmark::where('product_id',$product_id)->where('name','Product')->get();
        $user = User::where('id',Auth::id())->first();

        if($user)
        {
            $chk_subscriber=Subscriber::where('email',$user->email)->first();
            $product_like =Like::where('product_id',$product_id)->where('user_id',$user->id)->where('name','Product')->first();
            $product_bookmark =Bookmark::where('product_id',$product_id)->where('user_id',$user->id)->where('name','Product')->first();
            // dd($product_like);
            return view('frontend.product',compact('product_ratings','chk_subscriber','cities','product','products','recomanded_products','recomanded_blogs','categories','product_comments','product_likes','product_like','product_bookmarks','product_bookmark','brand_profile'));
        }
        else{
            $product_like = null;
            $product_bookmark = null;
            $chk_subscriber = null;
            return view('frontend.brand_product',compact('product_ratings','chk_subscriber','cities','product','products','recomanded_products','recomanded_blogs','categories','product_comments','product_likes','product_like','product_bookmarks','product_bookmark','brand_profile'));
        }
        // dd($recomanded_products);

    }

    public function store_blog_comment(Request $request)
    {
        $user_id = Auth::id();
        $user = User::where('id',Auth::id())->first();

        $this->validate($request,[
            'comment'=>'required',

        ]);

        $blog_comment = new BlogComment;


        if($request->name == 'on' || $user == null)
        {
            $blog_comment->name = 'anonymous';
            $blog_user_name = 'anonymous';
        }
        else
        {
            $blog_comment->user_id = $user_id;
            $blog_user_name = $user->name;
        }
        if($request->parent_id)
        {
            $blog_comment->parent_id = $request->parent_id;
            $blog_comment->status = 1;
        }
        if($request->bedside_manner_rating)
        {
            $blog_comment->rating = $request->bedside_manner_rating;
        }
        $blog_comment->comment = $request->comment;

        $blog_comment->blog_id  = $request->blog_id;
        $blog_comment->save();

        $point = Point::create([
            'source' => PointsHelper::Article,
            'points' => PointsHelper::Comment,
            'user_id' => $user_id,
            'sourceable_id' => $blog_comment->id,
            'sourceable_type' => BlogComment::class
        ]);

        $blog = Blog::find($request->blog_id);

        $blog->points()->save($point);

        return Redirect::back()->with('success','תגובתך נשלחה לאישור, לאחר האישור תזוכה בנקודות, והתגובה תופיע באתר! ');
    }

    public function store_product_comment(Request $request)
    {
        $user_id = Auth::id();
        $user = User::where('id',$user_id)->first();

        $this->validate($request,[
            'comment'=>'required',

        ]);
        $product_comment = new ProductComment;

        if($request->name == 'on' || $user == null)
        {
            $product_comment->name = 'anonymous';
            $product_user_name = 'anonymous';
        }
        else
        {
            $product_comment->user_id = $user_id;
            $product_user_name = $user->name;
        }
        if($request->parent_id)
        {
            $product_comment->parent_id = $request->parent_id;
            $product_comment->status = 1;
        }
        if($request->bedside_manner_rating)
        {
            // dd("sdd");
            $product_comment->rating = $request->bedside_manner_rating;
        }
        $product_comment->comment = $request->comment;
        $product_comment->product_id  = $request->product_id;
        $product_comment->save();

        if (Auth::check()){
            $point = Point::create([
                'source' => PointsHelper::Product,
                'points' => PointsHelper::Comment,
                'user_id' => $user_id,
                'sourceable_id' => $product_comment->id,
                'sourceable_type' => ProductComment::class
            ]);

            $product = Product::find($request->product_id);

            $product->points()->save($point);


        }

        toastr()->success('תגובתך נשלחה לאישור, לאחר האישור תזוכה בנקודות, והתגובה תופיע באתר!');

        return Redirect::back();

        // return response()->json(['success'=>'Product Comment saved successfully', 'comment' => $request->comment,'name'=>$product_user_name]);
    }

    public function brand_profile($brand_id)
    {
        $cities = City::get();
        $brand_profile = BrandProfile::with('brandaddresses','category','user')->where('id',$brand_id)->first();
        $brand_products = Product::with('product_comment')->where('brand_profile_id',$brand_id)->get();
        $blog_1 = Blog::where('brand_profile_id',$brand_profile->id)->where('status',1)->first();
        $blog_2 = Blog::where('brand_profile_id',$brand_profile->id)->where('status',1)->skip(1)->first();
        $blog_3 = Blog::where('brand_profile_id',$brand_profile->id)->where('status',1)->skip(2)->first();
        $categories = Category::get();
        $brand_timming = BrandTimming::where('brand_profile_id',$brand_profile->id)->first();



        // dd($blog_1,$blog_2,$blog_3);
        return view('frontend.brand_profile',compact('brand_timming','brand_profile','brand_products','blog_1','blog_2','blog_3','cities','categories'));
    }

    public function profile()
    {
        $brand_id = Helpers::profile_id();
        // dd($brand_id);
        if($brand_id != null)
        {
            $cities = City::get();
            $brand_profile = BrandProfile::with('brandaddresses','category','user')->where('id',$brand_id)->first();
            $brand_products = Product::with('product_comment')->where('brand_profile_id',$brand_id)->get();
            $blog_1 = Blog::where('brand_profile_id',$brand_profile->id)->where('status',1)->first();
            $blog_2 = Blog::where('brand_profile_id',$brand_profile->id)->where('status',1)->skip(1)->first();
            $blog_3 = Blog::where('brand_profile_id',$brand_profile->id)->where('status',1)->skip(2)->first();
            $categories = Category::get();
            $brand_timming = BrandTimming::where('brand_profile_id',$brand_profile->id)->first();
            // dd($brand_profile->brandaddresses);
            return view('frontend.brand_profile',compact('brand_timming','brand_profile','brand_products','blog_1','blog_2','blog_3','cities','categories'));

        }
        else{
            return redirect('Not Any brand Created Yet');
        }



        // dd($blog_1,$blog_2,$blog_3);
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
        $user_id = Auth::id();
        $blog = Like::where('user_id',$user_id)->where('blog_id',$request->blog_id)->where('name','Article')->first();
        if($blog)
        {
            Like::where('id',$blog->id)->where('name','Article')->delete();

            Point::where([
                'source' => PointsHelper::Article,
                'user_id' => $user_id,
                'pointable_id' => $request->blog_id,
                'sourceable_id' => $blog->id,
                'sourceable_type' => Like::class
            ])->delete();
            return response()->json(['success'=>'Blog Like Removed']);
        }
        else{
            $blog_like= new Like;
            $blog_like->name = 'Article';
            $blog_like->blog_id = $request->blog_id;
            $blog_like->user_id = $user_id;
            $blog_like->save();

            $point = Point::create([
                'source' => PointsHelper::Article,
                'points' => PointsHelper::Like,
                'user_id' => $user_id,
                'sourceable_id' => $blog_like->id,
                'sourceable_type' => Like::class
            ]);

            $blog = Blog::find($request->blog_id);

            $blog->points()->save($point);

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
        if(!Auth::check()){
            return response()->json(['success'=>'Login Required']);
        }

        $user_id = Auth::id();

        $product = Like::where('user_id',$user_id)->where('product_id',$request->product_id)->where('name','Product')->first();
        if($product)
        {
            Like::where('id',$product->id)->where('name','Product')->delete();
            Point::where([
                'source' => PointsHelper::Product,
                'user_id' => $user_id,
                'pointable_id' => $request->product_id,
                'sourceable_id' => $product->id,
                'sourceable_type' => Like::class
            ])->delete();
            return response()->json(['success'=>'Product Like Removed']);
        }
        else{
            $product_like= new Like;
            $product_like->name = 'Product';
            $product_like->product_id = $request->product_id;
            $product_like->user_id = $user_id;
            $product_like->save();

            $point = Point::create([
                'source' => PointsHelper::Product,
                'points' => PointsHelper::Like,
                'user_id' => $user_id,
                'sourceable_id' => $product_like->id,
                'sourceable_type' => Like::class
            ]);

            $product = Product::find($request->product_id);

            $product->points()->save($point);

            return response()->json(['success'=>'Product Like successfully']);
        }
        // return view('frontend.brand_products',compact('products','brand_profile','cities','categories'));
    }

    public function store_product_bookmark(Request $request)
    {
        // dd($request->all());
        $user_id = Auth::id();
        $product = Bookmark::where('user_id',$user_id)->where('product_id',$request->product_id)->where('name','Product')->first();
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
        $id=$_GET['id'] ?? '';
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
        $bookmark_products =Bookmark::with('product')->where('name' , 'Product')->where('user_id' , Auth::id())->get();
        $bookmark_blogs =Bookmark::with('blog')->where('name' , 'Article')->where('user_id' , Auth::id())->get();
        // dd($bookmark_products,$bookmark_blogs);
        return view('frontend.bookmark',compact('cities','categories','bookmark_products','bookmark_blogs'));

        // dd($recomanded_blogs);

    }

    public function category($category_id,$city_id)
    {
        // dd($city_id);
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

        // dd($discount_products);

        $products = DB::table('products_has_cities')
        ->LeftJoin('products', 'products.id', '=', 'products_has_cities.product_id')
        ->LeftJoin('categories', 'categories.id', '=', 'products.category_id')
        // ->leftJoin('product_comments', 'product_comments.product_id', '=', 'products.id')
        ->Join('brand_profiles', 'brand_profiles.id', '=', 'products.brand_profile_id')
        ->select('products.*'
        ,'brand_profiles.brand_name'
        // ,DB::raw('avg(product_comments.rating) as avgrate')
        )
        ->where('products_has_cities.city_id',$city_id)
        ->where('products.category_id',$category_id)
        ->where('products.discount_price','=', null)
        ->get();

        // dd($products,$category_id,$city_id);
        $blogs = DB::table('blogs_has_cities')
        ->LeftJoin('blogs', 'blogs.id', '=', 'blogs_has_cities.blog_id')
        ->LeftJoin('categories', 'categories.id', '=', 'blogs.category_id')
        ->Join('brand_profiles', 'brand_profiles.id', '=', 'blogs.brand_profile_id')
        // ->Join('likes', 'likes.blog_id', '=', 'blogs.id')
        ->select('blogs.*','brand_profiles.brand_name','brand_profiles.short_name'
        // ,DB::raw('count(likes.id) as totallikes')
        )
        ->where('blogs_has_cities.city_id',$city_id)
        ->where('blogs.category_id',$category_id)
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

        $brand_messages = DB::table('brands_message_has_cities')
        ->Join('brand_messages', 'brand_messages.id', '=', 'brands_message_has_cities.brand_message_id')
        ->Join('brand_profiles', 'brand_profiles.id', '=', 'brand_messages.brand_profile_id')
        ->select('brand_messages.*','brand_profiles.brand_image')
        ->where('brands_message_has_cities.city_id',$city_id)
        ->get();

        // dd($brand_messages,$city_id);
        return view('frontend.city_category',compact('cities','brand_messages','categories','discount_products','products','brands_recomanded_products','blogs','category_id','city_id'));
    }

    public function show_all_blogs($category_id,$city_id)
    {       
        // dd($city_id);
        $categories = Category::get();
        $cities = City::get();

        $blogs = DB::table('blogs_has_cities')
        ->LeftJoin('blogs', 'blogs.id', '=', 'blogs_has_cities.blog_id')
        ->LeftJoin('categories', 'categories.id', '=', 'blogs.category_id')
        ->Join('brand_profiles', 'brand_profiles.id', '=', 'blogs.brand_profile_id')
        ->select('blogs.*','brand_profiles.brand_name','brand_profiles.short_name'
        )
        ->where('blogs_has_cities.city_id',$city_id)
        ->where('blogs.category_id',$category_id)
        ->get();
        // dd($blogs);

        $brand_messages = DB::table('brands_message_has_cities')
        ->Join('brand_messages', 'brand_messages.id', '=', 'brands_message_has_cities.brand_message_id')
        ->Join('brand_profiles', 'brand_profiles.id', '=', 'brand_messages.brand_profile_id')
        ->select('brand_messages.*','brand_profiles.brand_image')
        ->where('brands_message_has_cities.city_id',$city_id)
        ->get();

        // dd($brand_messages,$city_id);
        return view('frontend.show_all_blogs',compact('cities','brand_messages','categories','blogs'));
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
    public function archive_cat()
    {
        $city_id = Helpers::city_id();
        $categories = Category::get();
        $cities = City::get();
        $product_categories = DB::table('products_has_cities')
        ->Join('products', 'products.id', '=', 'products_has_cities.product_id')
        ->Join('categories', 'categories.id', '=', 'products.category_id')
        // ->Join('recomended_products', 'recomended_products.product_id', '=', 'products.id')
        ->Join('brand_profiles', 'brand_profiles.id', '=', 'products.brand_profile_id')
        ->select('categories.*','brand_profiles.brand_name')
        ->where('products_has_cities.city_id',$city_id )
        ->where('products.discount_price', null)
        ->groupBy('categories.id')
        ->get();
        // dd($product_categories);
        if(count($product_categories) > 0)
        {

            return view('frontend.archive.archive_category',compact('cities','categories','product_categories'));
        }
        else
        {
            toastr()->error('Categories with product not found');
            return Redirect::back();
        }
    }
    public function city_brands()
    {
        $city_id = Helpers::city_id();
        $categories = Category::get();
        $cities = City::get();

        $city_brands = DB::table('brands_has_cities')
        ->Join('brand_profiles', 'brand_profiles.id', '=', 'brands_has_cities.brand_profile_id')
        ->select('brand_profiles.*')
        ->where('brands_has_cities.city_id',$city_id)
        ->get();
        // dd($city_brands);

        $brand_messages = DB::table('brands_message_has_cities')
        ->Join('brand_messages', 'brand_messages.id', '=', 'brands_message_has_cities.brand_message_id')
        ->Join('brand_profiles', 'brand_profiles.id', '=', 'brand_messages.brand_profile_id')
        ->select('brand_messages.*','brand_profiles.brand_image')
        ->where('brands_message_has_cities.city_id',$city_id)
        ->get();
        //  dd($city_brands);
        if(auth::id())
        {
            $user_id = Auth::user();
            $chk_subscriber = Subscriber::where('email',$user_id->email)->first();
            return view('frontend.city_brands',compact('chk_subscriber','cities','categories','city_brands','brand_messages'));
        }
        else{
            $chk_subscriber = null;
            return view('frontend.city_brands',compact('chk_subscriber','cities','categories','city_brands','brand_messages'));
        }
    }

    public function user_messages()
    {
        $cities = City::get();
        $categories = Category::get();
        $id=$_GET['id'] ?? '';
        return view('frontend.messages',compact('id','cities','categories'));
    }

    public function store_subscriber(Request $request)
    {
        // dd($request);
        // $subscriber = Subscriber::where('email',Auth::user()->email)->first();
        // if($subscriber == null){
            $subscriber= new Subscriber;
            $subscriber->email = Auth::user()->email;
            $subscriber->brand_profile_id = $request->brand_profile_id;
            $subscriber->save();
            // if($request->brand_page)
            // {
            //     // toastr()->success('Successfully Subscribe');
            // return Redirect::back()->with('success','Successfully Subscribe');
            // }
            // else{
                return response()->json(['success'=>'Successfully Subscribe']);
            // }
        // }
        // else{
        //     return Redirect::back()->with('warning','Already Subscribe');
        // }
    }

    public function store_subscribers(Request $request)
    {
        // dd($request);
        // $subscriber = Subscriber::where('email',Auth::user()->email)->first();
        // if($subscriber == null){
            $subscriber= new Subscriber;
            $subscriber->email = Auth::user()->email;
            $subscriber->brand_profile_id = $request->brand_profile_id;
            $subscriber->save();
            return Redirect::back();
            
    }

    public function wallet()
    {
        $categories = Category::get();
        $cities = City::get();
        $products = AdminProduct::orderBy('id', 'DESC')->get();
        $admin = User::with(array('Roles' => function($query) {
            $query->where('name','Admin');
        }))
        ->first();
        $product_ratings = ProductComment::select(['product_comments.*',DB::raw('avg(product_comments.rating) as avgrate'),DB::raw('count(product_comments.id) as count_rating')])
        ->groupBy('product_comments.product_id')
        ->orderBy('avgrate', 'Desc')
        // ->where('product_comments.parent_id',null)
        ->where('product_comments.rating','!=',null)
        ->where('product_comments.user_id', Auth::user()->id)
        // ->limit(10)
        ->get();

        $product_comments = ProductComment::select(['product_comments.*',DB::raw('avg(product_comments.rating) as avgrate'),DB::raw('count(product_comments.id) as count_comment')])
        ->groupBy('product_comments.product_id')
        ->orderBy('avgrate', 'Desc')
        ->where('product_comments.user_id', Auth::user()->id)
        ->get();
        $likes = Like::where('user_id',Auth::user()->id)->get();

        $coins = Point::where('user_id',Auth::user()->id)->sum('points');
        $usedcoins = AdminProductOrder::where('user_id',Auth::user()->id)->sum('coins');
        // dd($usedcoins,$coins);
        // dd($coins);
        $totalcoins = $coins - $usedcoins;
        return view('frontend.user_wallet',compact('totalcoins','usedcoins','coins','cities','categories','products','admin','product_ratings','product_comments','likes'));
    }

    public function store_wallet(Request $request)
    {
        // dd($request->all());
        $admin_product= new AdminProductOrder;
        $admin_product->coins = $request->coins;
        $admin_product->product_id = $request->product_id;
        $admin_product->user_id = Auth::id();
        $admin_product->save();
        toastr()->success('You have successfully Purchased');
        return Redirect::back();
    }

    public function search_product(Request $request)
    {
        //  dd($request->all());
        $categories = Category::get();
        $cities = City::get();
        $product_results = Product::with('brandprofile','cities')->select('*')->where("name","LIKE","%{$request->search_product}%")->whereHas('cities', function ($q){
            $q->where('city_id',5);
        })
        ->get();

        $article_results = Blog::with('brandprofile','cities')->select('*')->where("title","LIKE","%{$request->search_product}%")->whereHas('cities', function ($q){
            $q->where('city_id',5);
        })
        ->get();

        // dd($results);
        return view('frontend.search_product',compact('cities','categories','article_results','product_results'));
    }

    public function brand_articles($brand_profile_id)
    {
        $brand_profile = BrandProfile::where('id',$brand_profile_id)->first();
        $articles = Blog::where('brand_profile_id',$brand_profile->id)->where('status',1)->get();

        return view('frontend.b_articles',compact('brand_profile','articles'));
    }

    public function brand_products($brand_profile_id)
    {
        $brand_profile = BrandProfile::where('id',$brand_profile_id)->first();
        $products = Product::where('brand_profile_id',$brand_profile->id)->where('status',1)->get();

        return view('frontend.b_products',compact('brand_profile','products'));
    }

}
