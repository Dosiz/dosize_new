<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/{city_id}',[App\Http\Controllers\FrontEndController::class, 'landing_page'])->name('landing-page');
Route::get('/article/{blog_id}',[App\Http\Controllers\FrontEndController::class, 'article_detail'])->name('article');
Route::get('/product/{product_id}',[App\Http\Controllers\FrontEndController::class, 'product_detail'])->name('product');
Route::get('/brand-profile/{brand_id}',[App\Http\Controllers\FrontEndController::class, 'brand_profile'])->name('brand-profile');
Route::post('/contact_us', [App\Http\Controllers\FrontEndController::class,'store'])->name('contact_us.store');
Route::get('/articles/{id}', [App\Http\Controllers\FrontEndController::class,'articles'])->name('articles');
Route::get('/brand-products/{id}', [App\Http\Controllers\FrontEndController::class,'products'])->name('brand-products');
// blog comment
Route::post('/store_blog_comment',[App\Http\Controllers\FrontEndController::class, 'store_blog_comment'])->name('store-blog-comment'); 
Route::post('/store_blog_comment_reply',[App\Http\Controllers\FrontEndController::class, 'store_blog_comment_reply'])->name('store-blog-comment-reply'); 

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

    //subscriber
    Route::get('/brand_subscriber',[App\Http\Controllers\brand\BrandController::class, 'brand_subscriber'])->name('brand-subscriber');
    
    
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

Route::get('archive/category', function () {
    return view('frontend.archive.category');
});

Route::get('archive_category', function () {
    return view('frontend.archive.archive_category');
});

Route::get('/brand/wallet', function () {
    return view('frontend.wallet');
});
