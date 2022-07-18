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

Route::get('/', function () {
    return view('landing_page');
});

Route::get('/',[App\Http\Controllers\FrontEndController::class, 'landing_page'])->name('landing-page');
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

    //blog
    Route::resource('blog', App\Http\Controllers\brand\BlogController::class);
    //product
    Route::resource('product', App\Http\Controllers\brand\ProductController::class);
    
});
/********************Brand ROUTES END******************************/

/*****************MANAGER ROUTES*******************/
Route::prefix('manager')->middleware('can:manager')->group(function(){
});
/********************MANAGER ROUTES END******************************/

Route::get('product', function () {
    return view('frontend.product');
});

Route::get('brand', function () {
    return view('frontend.brand');
});

Route::get('article', function () {
    return view('frontend.article');
});

Route::get('messages', function () {
    return view('frontend.messages');
});

Route::get('inbox-message', function () {
    return view('frontend.inbox_message');
});

Route::get('archive-message', function () {
    return view('frontend.archive_message');
});

Route::get('archive-category', function () {
    return view('frontend.archive.category');
});

Route::get('archive_category', function () {
    return view('frontend.archive.archive_category');
});

Route::get('wallet', function () {
    return view('frontend.wallet');
});
