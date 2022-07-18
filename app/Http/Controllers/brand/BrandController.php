<?php

namespace App\Http\Controllers\brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrandProfile; 
use App\Models\BrandsHasSubCategory;   
use App\Models\BrandsHasAddress;   
use App\Models\User;   
use Auth;

class BrandController extends Controller
{
    public function brand_register(Request $request)
    {
        // dd($request->all());
        $user_id = Auth::id();
        $user = User::where('id',Auth::id())->first();
        $this->validate($request,[ 
            'brand_name'=>'required', 
            'category_id'=>'required', 
            'addmore.*' => 'required',
            'description'=>'required', 
            'brand_image'=>'required', 
            'brand_logo'=>'required', 
            'sub_category_id'=>'required', 

        ],
        [
            'addmore.0.required' => 'Enter first Address',
            'addmore.1.required' => 'Enter second address',
            'addmore.2.required' => 'Enter third address',
            'addmore.3.required' => 'Enter forth address',
            'addmore.4.required' => 'Enter fifth address',
            'addmore.5.required' => 'Enter sixth address',
            'addmore.6.required' => 'Enter seventh address',
        ]);
        // dd($request->all());
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
        // $collection->implode('name', ', ');
        // $brand_profile->address = $request->address;
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
            $brand_address= new BrandsHasAddress;
            $brand_address->brand_profile_id=$brand_profile->id;
            $brand_address->address = $address;
            $brand_address->city_id = $user->city_id;
            $brand_address->save();
        }

        BrandsHasSubCategory::where('brand_profile_id',$brand_profile->id)->delete();
        
        foreach($request->sub_category_id as $sub_category)
        {
            // dd($brand_profile->id,"working");
            $brand_subcategory= new BrandsHasSubCategory;
            $brand_subcategory->sub_category_id=$sub_category;
            $brand_subcategory->brand_profile_id = $brand_profile->id;
            $brand_subcategory->save();
        }
        $brand_profile = BrandProfile::where('id',$brand_profile->id)->first();
        return view('brand.brand_profile_message',compact('brand_profile'));
        // return redirect('dashboard/dashboard');
        // } catch (\Exception $exception) {
        //     return Redirect::back();
        // }
    }

}
