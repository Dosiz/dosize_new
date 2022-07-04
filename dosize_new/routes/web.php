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

Route::get('/', function () {
    return view('landing_page');
});

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
