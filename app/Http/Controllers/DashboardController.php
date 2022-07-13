<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\City;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\BrandsHasSubCategory;
use App\Models\BrandProfile;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::where('id',Auth::id())->first();
        if(Auth::user()->hasRole('Admin'))
        {
            return view('admin.dashboard.index',compact('user'));
        }
        elseif(Auth::user()->hasRole('Brand'))
        {
            $brand_profile = BrandProfile::where('user_id',$user->id)->first();
            if($brand_profile ==null || $brand_profile->status == '0')
            {
                $categories = Category::get();
                $sub_categories = BrandsHasSubCategory::with('subcategory')->where('brand_profile_id',$brand_profile->id)->get();
                // dd($sub_categories);
                return view('brand.brand_profile',compact('categories','brand_profile','sub_categories'));
            }
            else{
                return view('brand.dashboard.index',compact('user'));
            }
        }
        elseif(Auth::user()->hasRole('Manager'))
        {
            return view('manager.dashboard.index',compact('user'));
        }
        else
        {
            return view('landing_page');
        }
    }

    public function fetch_subcategory(Request $request)
    {
        $data['sub_categories'] = SubCategory::where("category_id", $request->category_id)->get(["name", "id"]);
  
        return response()->json($data);
    }
}
