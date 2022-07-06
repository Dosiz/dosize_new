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

/*****************DASHBOARD ROUTES*******************/
Route::prefix('dashboard')->middleware(['auth','dashboard'])->group(function(){
    Route::get('/dashboard',[App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});
/********************DASHBOARD ROUTES END******************************/

/*****************ADMIN ROUTES*******************/
Route::prefix('admin')->middleware('can:admin')->group(function(){
    //city
    Route::resource('city', App\Http\Controllers\admin\CityController::class);

    //brands
    Route::get('/brands',[App\Http\Controllers\admin\DashboardController::class, 'brands'])->name('admin.brands');
    Route::post('/update_brand_status/{id}', [App\Http\Controllers\admin\DashboardController::class,'update_brand_status'])->name('update-brand-status');

    //users
    Route::get('/users',[App\Http\Controllers\admin\DashboardController::class, 'users'])->name('admin.users');
    Route::post('/update_user_status/{id}', [App\Http\Controllers\admin\DashboardController::class,'update_user_status'])->name('update-user-status');

});
/********************ADMIN ROUTES END******************************/

/*****************Brand ROUTES*******************/
Route::prefix('brand')->middleware('can:brand')->group(function(){
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
