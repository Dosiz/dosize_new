<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('getShortUrl',function (Request $request){
    $shortURL = \App\Helpers\Helpers::createShortUrl($request->url);
    return response()->json($shortURL);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/article/{blog_id}',[App\Http\Controllers\FrontEndController::class, 'article_detail'])->name('article');
Route::get('/product/{product_id}',[App\Http\Controllers\FrontEndController::class, 'product_detail'])->name('product');
Route::get('/brand-profile/{brand_id}',[App\Http\Controllers\FrontEndController::class, 'brand_profile'])->name('brand-profile');
Route::post('/contact_us', [App\Http\Controllers\FrontEndController::class,'store'])->name('contact_us.store');
Route::get('/articles/{id}', [App\Http\Controllers\FrontEndController::class,'articles'])->name('articles');
Route::get('/brand/articles/{id}', [App\Http\Controllers\FrontEndController::class,'brand_articles'])->name('brand-articles');
Route::get('/brand/products/{id}', [App\Http\Controllers\FrontEndController::class,'brand_products'])->name('brand-product');
Route::get('/brand-products/{id}', [App\Http\Controllers\FrontEndController::class,'products'])->name('brand-products');
// blog comment
Route::post('/store_blog_comment',[App\Http\Controllers\FrontEndController::class, 'store_blog_comment'])->name('store-blog-comment');
Route::post('/store_blog_comment_reply',[App\Http\Controllers\FrontEndController::class, 'store_blog_comment_reply'])->name('store-blog-comment-reply');
Route::post('/user/search_product',[App\Http\Controllers\FrontEndController::class, 'search_product'])->name('search-product');

//subscriber
Route::post('/store_subscriber',[App\Http\Controllers\FrontEndController::class, 'store_subscriber'])->name('store-subscriber');

//articles and products like and bookmarks
Route::post('/store_blog_comment_like',[App\Http\Controllers\FrontEndController::class, 'store_blog_comment_like'])->name('store-blog-comment-like');
Route::post('/store_blog_bookmark',[App\Http\Controllers\FrontEndController::class, 'store_blog_bookmark'])->name('store-blog-bookmark');

Route::post('/store_product_comment_like',[App\Http\Controllers\FrontEndController::class, 'store_product_comment_like'])->name('store-product-comment-like');
Route::post('/store_product_bookmark',[App\Http\Controllers\FrontEndController::class, 'store_product_bookmark'])->name('store-product-bookmark');

Route::get('/brand/bookmarks',[App\Http\Controllers\FrontEndController::class, 'bookmarks'])->name('bookmarks');

Route::get('/brands/{city_id}',[App\Http\Controllers\FrontEndController::class, 'city_brands'])->name('city-brands');
Route::get('/user/messages',[App\Http\Controllers\FrontEndController::class, 'user_messages'])->name('user-message');

Route::get('/category/{category_id}/{city_id}',[App\Http\Controllers\FrontEndController::class, 'category'])->name('category_by_city');
Route::get('/category_article_detail/{category_id}/{city_id}',[App\Http\Controllers\FrontEndController::class, 'category_article_detail'])->name('category_article_detail');

// product comment
Route::post('/store_product_comment',[App\Http\Controllers\FrontEndController::class, 'store_product_comment'])->name('store-product-comment');

//blog and product comment
Route::post('/blog_comment', [App\Http\Controllers\FrontEndController::class, 'blog_comment'])->name('blog-comment');

Route::post('/fetch-subcategory',[App\Http\Controllers\DashboardController::class, 'fetch_subcategory'])->name('fetch-subcategory');
/*****************DASHBOARD ROUTES*******************/
Route::prefix('dashboard')->middleware(['auth','dashboard'])->group(function(){
    Route::get('/dashboard',[App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

//brand-profile
Route::get('/profile',[App\Http\Controllers\DashboardController::class, 'brand_profile'])->name('profile');
Route::post('/profile-store',[App\Http\Controllers\DashboardController::class, 'profile_store'])->name('profile.store');

});


/********************DASHBOARD ROUTES END******************************/

/*****************ADMIN ROUTES*******************/
Route::prefix('admin')->middleware('can:admin')->group(function(){
    //city
    Route::resource('city', App\Http\Controllers\admin\CityController::class);
    //admin_product
    Route::resource('admin_product', App\Http\Controllers\admin\ProductController::class);
    //admin product order
    Route::get('/admin_product_orders',[App\Http\Controllers\admin\ProductController::class, 'admin_product_orders'])->name('admin-product-orders');
    Route::get('/admin_order_detail/{order_id}',[App\Http\Controllers\admin\ProductController::class, 'admin_order_detail'])->name('order.show');
    
    //cateogry
    Route::resource('category', App\Http\Controllers\admin\CategoryController::class);
    //city
    Route::resource('sub-category', App\Http\Controllers\admin\SubCategoryController::class);

    //brands
    Route::get('/brands',[App\Http\Controllers\admin\DashboardController::class, 'brands'])->name('admin.brands');
    Route::post('/update_brand_status/{id}', [App\Http\Controllers\admin\DashboardController::class,'update_brand_status'])->name('update-brand-status');

    Route::post('/update_brand/{id}', [App\Http\Controllers\admin\DashboardController::class,'update_brand'])->name('update-brand');
    // view profile
    Route::get('/view-brand/{id}',[App\Http\Controllers\admin\DashboardController::class, 'view_brand'])->name('admin.view-brand');
    // allow multiple city
    Route::post('/update_brand_city/{id}', [App\Http\Controllers\admin\DashboardController::class,'update_brand_city'])->name('update-brand-city');

    Route::post('/add-city-brand/{brand_profile_id}', [App\Http\Controllers\admin\DashboardController::class,'add_city_brand'])->name('add-city-brand');

    //users
    Route::get('/users',[App\Http\Controllers\admin\DashboardController::class, 'users'])->name('admin.users');
    Route::post('/update_user_status/{id}', [App\Http\Controllers\admin\DashboardController::class,'update_user_status'])->name('update-user-status');

});
/********************ADMIN ROUTES END******************************/

/*****************Brand ROUTES*******************/
Route::prefix('brand')->middleware('can:brand')->group(function(){
    //brands
    Route::post('/brand_register',[App\Http\Controllers\brand\BrandController::class, 'brand_register'])->name('brand-register');
    //brand-messag
    Route::resource('brand-message', App\Http\Controllers\brand\BrandMessageController::class);

    //blog
    Route::resource('blog', App\Http\Controllers\brand\BlogController::class);
    //blog-comment
    Route::resource('blog', App\Http\Controllers\brand\BlogController::class);
    //product
    Route::resource('product', App\Http\Controllers\brand\ProductController::class);

    //brand_timming
    Route::resource('/brand_timming', App\Http\Controllers\brand\BrandTimmingController::class);

    //subscriber
    Route::get('/design',[App\Http\Controllers\brand\BrandController::class, 'brand_design'])->name('brand-design');
    Route::post('/store_design',[App\Http\Controllers\brand\BrandController::class, 'store_brand_design'])->name('store-design');

    //subscriber
    Route::get('/brand_subscriber',[App\Http\Controllers\brand\BrandController::class, 'brand_subscriber'])->name('brand-subscriber');
    
    // blog and products comments status
    Route::get('/blog_comments',[App\Http\Controllers\brand\BrandController::class, 'blog_comments'])->name('brand-blog-comments');
    Route::get('/product_comments',[App\Http\Controllers\brand\BrandController::class, 'product_comments'])->name('brand-product-comments');
    Route::post('/update_product_comment/{id}', [App\Http\Controllers\brand\BrandController::class,'update_product_comment'])->name('update-product-comment');
    Route::post('/update_blog_comment/{id}', [App\Http\Controllers\brand\BrandController::class,'update_blog_comment'])->name('update-blog-comment');


});
/********************Brand ROUTES END******************************/

/*****************MANAGER ROUTES*******************/
Route::middleware('auth')->group(function(){
    Route::get('/brand/messages',[App\Http\Controllers\FrontEndController::class, 'messages'])->name('messages');

    //wallet
    Route::get('/user/wallet',[App\Http\Controllers\FrontEndController::class, 'wallet'])->name('user.wallet');
    Route::post('/store-wallet',[App\Http\Controllers\FrontEndController::class, 'store_wallet'])->name('store-wallet');
});
/********************MANAGER ROUTES END******************************/

Route::get('products', function () {
    // dd("sdds");
    return view('frontend.product');
});


Route::get('inbox-message', function () {
    return view('frontend.inbox_message');
});

Route::get('archive-message', function () {
    return view('frontend.archive_message');
});

Route::get('archive/category' ,[App\Http\Controllers\FrontEndController::class, 'archive_cat'])->name('archive_cat'); 


Route::get('archive_category', function () {
    return view('frontend.archive.archive_category');
});

Route::get('/brand/wallet', function () {
    return view('frontend.wallet');
});

Route::get('auth/google', [App\Http\Controllers\Auth\SocialController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [App\Http\Controllers\Auth\SocialController::class, 'handleGoogleCallback'])->name('auth.google_callback');

Route::get('auth/facebook', [App\Http\Controllers\Auth\SocialController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('auth/facebook/callback', [App\Http\Controllers\Auth\SocialController::class, 'handleFacebookCallback'])->name('auth.facebook_callback');

Route::domain('{subdomain}.'.config('app.short_url'))->group(function () {    
    // Route::get('/brand', 'BrandProfileController@brand_profile')->name('brand');
    // Route::get('/city', 'BrandProfileController@city_search')->name('city'); 
    Route::get('/{city_id}',[App\Http\Controllers\FrontEndController::class, 'landing_page'])->name('landing-page');
    // Route::get('/{city_id}',[App\Http\Controllers\FrontEndController::class, 'landing_page'])->name('landing-page');

});

Route::get('/', function () {
    return 'First sub domain';
})->domain('blog.' . env('APP_URL'));
