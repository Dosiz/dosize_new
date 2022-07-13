<?php

namespace App\Http\Controllers\brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrandProfile; 
use App\Models\BrandsHasSubCategory; 
use Auth;

class BrandController extends Controller
{
    public function brand_register(Request $request)
    {
        $user_id = Auth::id();
        $this->validate($request,[ 
            'brand_name'=>'required', 
            'category_id'=>'required', 
            'address'=>'required', 
            'description'=>'required', 
            'brand_image'=>'required', 
            'brand_logo'=>'required', 
            'sub_category_id'=>'required', 

        ]);
        // try {
        $brand = BrandProfile::where('user_id', '=', $user_id)->first();
        if($brand != null){
            $id = $brand->id;
            $brand_profile = BrandProfile::find($id);
        }
        else {
            $brand_profile= new BrandProfile;
        }
        $brand_profile->brand_name = $request->brand_name;
        $brand_profile->category_id = $request->category_id;
        $brand_profile->address = $request->address;
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

        BrandsHasSubCategory::where('brand_profile_id',$user_id)->delete();
        
        foreach($request->sub_category_id as $sub_category)
        {
            $brand_subcategory= new BrandsHasSubCategory;
            $brand_subcategory->sub_category_id=$sub_category;
            $brand_subcategory->brand_profile_id = $brand_profile->id;
            $brand_subcategory->save();
        }
        return redirect('dashboard/dashboard');
        // } catch (\Exception $exception) {
        //     return Redirect::back();
        // }
    }
}
