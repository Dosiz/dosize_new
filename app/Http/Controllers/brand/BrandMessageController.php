<?php

namespace App\Http\Controllers\brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Auth;
use DB;
use App\Models\City;
use App\Models\BrandMessage;
use App\Models\BrandProfile;
use App\Models\BrandsHasCity;
use App\Models\BrandsMessageHasCity;
use Illuminate\Support\Facades\Redirect;

class BrandMessageController extends Controller
{
    public function index()
    {
        $brand_profile = BrandProfile::where('user_id',Auth::id())->first();
        $brand_message = BrandMessage::with('brandprofile')->where('brand_profile_id',$brand_profile->id)->first();
        // dd($blogs);
        return view('brand.brand_message.index', compact('brand_message'));
        
    }      

    public function create(Request $request)
    {
            $user_id = Auth::id();
            $brand_profile = BrandProfile::with('category')->where('user_id',$user_id)->first();
            $brand_cities = BrandsHasCity::with('city')->where('brand_profile_id',$brand_profile->id)->get();
            return view('brand.brand_message.add', compact('brand_profile','brand_cities'));
        
    }

    


    public function show($id)
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[ 
            'message'=>'required', 
            'end_date'=>'required',  
            'profile_id'=>'required', 
            'city_id'=>'required', 

        ]);
        $brand_message= new BrandMessage;
        $brand_message->message = $request->message;
        $brand_message->end_date = $request->end_date;
        $brand_message->brand_profile_id = $request->profile_id;
        
        $brand_message->save();
        
        BrandsMessageHasCity::where('brand_profile_id',$request->profile_id)->delete();

        foreach($request->city_id as $city_id)
        {
            // dd($address);
            $brand_city= new BrandsMessageHasCity;
            $brand_city->brand_profile_id=$request->profile_id;
            $brand_city->brand_message_id=$brand_message->id;
            $brand_city->city_id = $city_id;
            $brand_city->save();
        }
        return redirect('brand/brand-message');
    }

    public function edit($id)
    {
        // try {
            $brand_message = BrandMessage::where('id',$id)->first();
            $brand_profile = BrandProfile::with('category')->where('user_id',Auth::id())->first();
            $brand_cities = BrandsHasCity::with('city')->where('brand_profile_id',$brand_profile->id)->get();
            $brand_message_cities = BrandsMessageHasCity::with('city')->where('brand_profile_id',$brand_profile->id)->get();
            // dd($blog_cities);
            return view('brand.brand_message.edit', compact('brand_message','brand_profile','brand_cities','brand_message_cities'));
        // } catch (\Exception $exception) {
        //     return Redirect::back();
        // }
    }

    public function update(Request $request,$brand_message_id)
    {
        // dd($request->all());
        $user_id = Auth::id();
        $brand_profile = BrandProfile::where('user_id',$user_id)->first();
        $this->validate($request,[ 
            'message'=>'required', 
            'end_date'=>'required',  
            'profile_id'=>'required', 
            'city_id'=>'required',

        ]);
        $brand_message= BrandMessage::find($brand_message_id);
        $brand_message->message = $request->message;
        $brand_message->end_date = $request->end_date;
        $brand_message->brand_profile_id = $request->profile_id;
        
        $brand_message->save();
        
        BrandsMessageHasCity::where('brand_message_id',$brand_message_id)->delete();

        foreach($request->city_id as $city_id)
        {
            // dd($address);
            $brand_city= new BrandsMessageHasCity;
            $brand_city->brand_profile_id=$request->profile_id;
            $brand_city->brand_message_id=$brand_message_id;
            $brand_city->city_id = $city_id;
            $brand_city->save();
        }
        return redirect('brand/brand-message');
    }

    public function destroy(Request $request , $id)
    {
        // try {
            $brand_profile = BrandProfile::where('user_id',$user_id)->first();
            BrandMessage::FindorFail($id)->delete();
            BrandsMessageHasCity::where('brand_profile_id' , $brand_profile->id)->delete();
                
               
            return Redirect::back();        
        // } catch (\Exception $exception) {
        //     return Redirect::back();
        // }
        
    }
}
