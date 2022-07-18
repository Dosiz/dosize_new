<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Product;
use App\Models\Blog;
use App\Models\SubCategory;
use App\Models\ProductsHasCity;
use App\Models\BrandProfile;
use App\Models\BrandsHasSubCategory;
use App\Models\BrandsHasAddress;
use App\Models\BrandsHasCity;
use Illuminate\Support\Facades\Redirect;

class FrontEndController extends Controller
{
    public function landing_page()
    {
        $cities = City::get();
        $products = Product::with('brandprofile')->where('status', '1')->get();
        $blogs = Blog::with('brandprofile')->where('status', '1')->get();
        // dd($products);
        return view('landing_page' , compact('cities','products','blogs'));
    }
}
