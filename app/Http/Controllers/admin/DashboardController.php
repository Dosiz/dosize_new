<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\City; 
use App\Models\BrandProfile; 
use App\Models\BrandsHasSubCategory; 
use App\Models\BrandsHasAddress; 
use App\Models\BrandsHasCity; 
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function brands()
    {
        $brands = User::whereHas(
            'roles', function($q){
                $q->where('name', 'Brand');
            }
        )->orderBy('id' , 'DESC')->paginate(5);
        // dd($brands);
        return view('admin.brand.index', compact('brands'));
    } 

    public function users()
    {
        $users = User::whereHas(
            'roles', function($q){
                $q->where('name', 'User');
            }
        )->get();
        return view('admin.user.index', compact('users'));
    } 

    public function update_brand_status(Request $request,$id)
    {
        $user = User::where('id',$id)->first();
        
        \DB::table('model_has_roles')->where('model_id', $id)->update( ['role_id' => '4']); 

        return Redirect::back();
        
    }

    public function update_brand_city(Request $request,$id)
    {
        $brand_profile= BrandProfile::where('id',$id)->first();
        if($brand_profile->allow_city == '0'){
        $brand_profile->allow_city = 1;
        }
        else{
            $brand_profile->allow_city = 0;
        }
        $brand_profile->update();
        return Redirect::back();
        
    }

    public function update_user_status(Request $request,$id)
    {
        // dd($request->all());
        $user = User::where('id',$id)->first();
        \DB::table('model_has_roles')->where('model_id', $id)->update( ['role_id' => '3']); 

        return Redirect::back();
        
    }

    public function update_brand(Request $request,$id)
    {
        // dd($request->status);
        // try {

            $brand_profile= BrandProfile::where('id',$id)->first();
            $user = User::where('id',$brand_profile->user_id)->first();
            // dd($user);
            if($brand_profile->status == '0'){
            $brand_profile->status = 1;
            
            $brand_city= new BrandsHasCity;
            $brand_city->brand_profile_id=$id;
            $brand_city->city_id = $user->city_id;
            $brand_city->save();
            
            }
            else{
                BrandsHasCity::where('brand_profile_id',$id)->delete();
                $brand_profile->status = 0;
            }
            $brand_profile->update();
            return redirect('admin/brands');
            
            // } catch (\Exception $exception) {
            //     // dd($exception->getMessage());
            //     return Redirect::back();
            // }
        
    }

    public function view_brand($id)
    {
        $brand_profile= BrandProfile::with('category')->where('id',$id)->first();
        $sub_categories = BrandsHasSubCategory::with('subcategory')->where('brand_profile_id',$brand_profile->id)->get();
        $addresses = BrandsHasAddress::with('brandprofile')->with('city')->where('brand_profile_id',$brand_profile->id)->get();
        $brand_cities = BrandsHasCity::with('city')->where('brand_profile_id',$brand_profile->id)->get();
        $cities = City::get();
        // dd($addresses);
        return view('admin.brand.view_brand', compact('brand_profile','sub_categories','addresses','brand_cities','cities'));
    }

    public function add_city_brand(Request $request,$brand_profile_id)
    {
        BrandsHasCity::where('brand_profile_id',$brand_profile_id)->delete();
        foreach($request->city_id as $city_id)
        {
            $brand_city= new BrandsHasCity;
            $brand_city->brand_profile_id=$brand_profile_id;
            $brand_city->city_id = $city_id;
            $brand_city->save();
        }

        return Redirect::back();
    }
}
