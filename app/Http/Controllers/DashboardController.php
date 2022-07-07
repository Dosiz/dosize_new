<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\City;
use App\Models\Category;
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
                return view('brand.brand_profile',compact('categories','brand_profile'));
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
}
