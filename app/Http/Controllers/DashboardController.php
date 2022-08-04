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
use App\Models\BrandsHasCity;
use App\Models\BrandsHasAddress;
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
                if($brand_profile)
                {
                    $sub_categories = BrandsHasSubCategory::with('subcategory')->where('brand_profile_id',$brand_profile->id)->get();
                    $addresses = BrandsHasAddress::with('brandprofile')->with('city')->where('brand_profile_id',$brand_profile->id)->get();
                // dd($addresses);
                }
                else{
                    $sub_categories = null;
                    $addresses = null;
                }
                return view('brand.brand_profile',compact('categories','brand_profile','sub_categories','addresses'));
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

    
    public function brand_profile()
    {
        $user = User::where('id',Auth::id())->first();
        $cities = City::get();
        $brand_profile = BrandProfile::where('user_id', Auth::id())->first();
        $sub_categories = BrandsHasSubCategory::with('subcategory')->where('brand_profile_id',$brand_profile->id)->get();
        $addresses = BrandsHasAddress::with('brandprofile')->with('city')->where('brand_profile_id',$brand_profile->id)->get();
        $brand_cities = BrandsHasCity::with('city')->where('brand_profile_id',$brand_profile->id)->get();
        if(count($brand_cities) == 0)
        {
            $brand_cities = User::with('city')->where('id',Auth::id())->get();
        }    
        // dd($brand_profile->allow_city);    
        return view('backend.profile', compact('brand_profile','sub_categories','addresses','user','cities','brand_cities'));
    }

    public function profile_store(Request $request)
    {
        //  dd($request->all());
        $user_id = Auth::id();
        $user = User::where('id',Auth::id())->first();
        $this->validate($request,[ 
            'brand_name'=>'required', 
            'addmore.*address' => 'required',
            'addmore.*city_id' => 'required',
            'description'=>'required', 

        ],
        [
            'addmore.0.address.required' => 'Enter first Address',
            'addmore.1.address.required' => 'Enter second address',
            'addmore.2.address.required' => 'Enter third address',
            'addmore.3.address.required' => 'Enter forth address',
            'addmore.4.address.required' => 'Enter fifth address',
            'addmore.5.address.required' => 'Enter sixth address',
            'addmore.6.address.required' => 'Enter seventh address',
            'addmore.6.address.required' => 'Enter eighty address',
            'addmore.6.address.required' => 'Enter ninth address',
            'addmore.6.address.required' => 'Enter tenth address',
            'addmore.0.city_id.required' => 'Enter first city',
            'addmore.1.city_id.required' => 'Enter second city',
            'addmore.2.city_id.required' => 'Enter third city',
            'addmore.3.city_id.required' => 'Enter forth city',
            'addmore.4.city_id.required' => 'Enter fifth city',
            'addmore.5.city_id.required' => 'Enter sixth city',
            'addmore.6.city_id.required' => 'Enter seventh city',
            'addmore.6.city_id.required' => 'Enter eighty city',
            'addmore.6.city_id.required' => 'Enter ninth city',
            'addmore.6.city_id.required' => 'Enter tenth city',
            'city_id.required' => 'Select Cities',
        ]);
        $brand = BrandProfile::where('user_id', '=', $user_id)->first();
        $id = $brand->id;
        $brand_profile = BrandProfile::find($id);
        
        $brand_profile->brand_name = $request->brand_name;
        $brand_profile->description = $request->description;
        $brand_profile->user_id = $user_id;
        if($request->hasfile('brand_image'))
        {
            $image = $request->file('brand_image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move('brand_image/',$image_name);
            $brand_profile->brand_image=$image_name;
        }
        if($request->hasfile('brand_logo'))
        {
            $b_image = $request->file('brand_logo');
            $brand_extensions =$b_image->extension();

            $image_name =time().'.'. $brand_extensions;
            $b_image->move('brand_logo/',$image_name);
            $brand_profile->brand_logo=$image_name;
        }
        $brand_profile->save();
        // dd($brand_profile);

        

        BrandsHasAddress::where('brand_profile_id',$brand_profile->id)->delete();
        
        foreach($request->addmore as $address)
        {
            // dd($address);
            $brand_address= new BrandsHasAddress;
            $brand_address->brand_profile_id=$brand_profile->id;
            $brand_address->address = $address['address'];
            $brand_address->city_id = $address['city_id'];
            $brand_address->save();
        }
        return redirect('dashboard/profile');
        
    }
}
