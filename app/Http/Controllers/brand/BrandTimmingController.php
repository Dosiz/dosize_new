<?php

namespace App\Http\Controllers\brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;  
use App\Models\BrandProfile;
use App\Models\BrandTimming; 
use Illuminate\Support\Facades\Redirect;

class BrandTimmingController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $brand_profile = BrandProfile::where('user_id',$user_id)->first();
        $brand_timming = BrandTimming::where('brand_profile_id',$brand_profile->id)->get();
        return view('brand.brand_timming.index', compact('brand_timming','brand_profile'));
        
        
    }      

    public function create()
    {
        try {
        $user_id = Auth::id();
        $brand_profile = BrandProfile::where('user_id',$user_id)->first();
        return view('brand.brand_timming.add', compact('brand_profile'));
        } catch (\Exception $exception) {
            toastr()->error($exception->getMessage());
            return Redirect::back();
        }
    }

    public function show($id)
    {
        try {
            //
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $user_id = Auth::id();
        $this->validate($request,[ 
            'mon_mor_open'=>'required', 
            'tue_mor_open'=>'required',
            'wed_mor_open'=>'required', 
            'thu_mor_open'=>'required', 
            'sun_mor_open'=>'required',

            'mon_noon_close'=>'required', 
            'tue_noon_close'=>'required',
            'wed_noon_close'=>'required', 
            'thu_noon_close'=>'required', 
            'sun_noon_close'=>'required',
 
            'friday_open'=>'required', 
            'friday_close'=>'required', 

        ]);
        try {
        $brand_timming= new BrandTimming;

        $mor_open = [];
        $mor_close = [];
        $noon_open = [];
        $noon_close = [];

        $mor_open['mon_mor_open'] =$request->mon_mor_open;
        $mor_open['tue_mor_open'] =$request->tue_mor_open;
        $mor_open['wed_mor_open'] =$request->wed_mor_open;
        $mor_open['thu_mor_open']  =$request->thu_mor_open;
        $mor_open['sun_mor_open']  =$request->sun_mor_open;
        $mor_open['sun_mor_open']  =$request->sun_mor_open;

        if($request->mon_mor_close){
            $mor_close['mon_mor_close'] =$request->mon_mor_close;
        }
        if($request->tue_mor_close){
            $mor_close['tue_mor_close'] =$request->tue_mor_close;
        }
        if($request->wed_mor_close){
            $mor_close['wed_mor_close'] =$request->wed_mor_close;
        }
        if($request->thu_mor_close){
            $mor_close['thu_mor_close']  =$request->thu_mor_close;
        }
        if($request->sun_mor_close){
            $mor_close['sun_mor_close']  =$request->sun_mor_close;
        }

        if($request->mon_noon_open){
            $noon_open['mon_noon_open'] =$request->mon_noon_open;
        }
        if($request->tue_noon_open){
            $noon_open['tue_noon_open'] =$request->tue_noon_open;
        }
        if($request->wed_noon_open){
            $noon_open['wed_noon_open'] =$request->wed_noon_open;
        }
        if($request->thu_noon_open){
            $noon_open['thu_noon_open']  =$request->thu_noon_open;
        }
        if($request->sun_noon_open){
            $noon_open['sun_noon_open']  =$request->sun_noon_open;
        }

        $noon_close['mon_noon_close'] =$request->mon_noon_close;
        $noon_close['tue_noon_close'] =$request->tue_noon_close;
        $noon_close['wed_noon_close'] =$request->wed_noon_close;
        $noon_close['thu_noon_close']  =$request->thu_noon_close;
        $noon_close['sun_noon_close']  =$request->sun_noon_close;

        $brand_timming->sat_thu_mor_open = $mor_open;
        $brand_timming->sat_thu_mor_close = $mor_close; 
        $brand_timming->sat_thu_noon_open = $noon_open;
        $brand_timming->sat_thu_noon_close = $noon_close;
        $brand_timming->friday_open = $request->friday_open;
        $brand_timming->friday_close = $request->friday_close;
        $brand_timming->brand_profile_id = $request->id;
        // dd($brand_timming);
        $brand_timming->save();
        toastr()->success('Successfully Added');
        return redirect('brand/brand_timming');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastr()->error('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function edit($id)
    {
        try {
            $user_id = Auth::id();
            $brand_profile = BrandProfile::where('user_id',$user_id)->first();
            $brand_timming = BrandTimming::where('id',$id)->first();
            return view('brand.brand_timming.edit', compact('brand_timming','brand_profile'));
        } catch (\Exception $exception) {
            toastr()->error($exception->getMessage());
            return Redirect::back();
        }
    }

    public function update(Request $request,$id)
    {
        // dd($request->all());
        $user_id = Auth::id();
        $this->validate($request,[ 
            'mon_mor_open'=>'required', 
            'tue_mor_open'=>'required',
            'wed_mor_open'=>'required', 
            'thu_mor_open'=>'required', 
            'sun_mor_open'=>'required',

            'mon_noon_close'=>'required', 
            'tue_noon_close'=>'required',
            'wed_noon_close'=>'required', 
            'thu_noon_close'=>'required', 
            'sun_noon_close'=>'required',
 
            'friday_open'=>'required', 
            'friday_close'=>'required', 

        ]);
        try {
        $brand_timming= BrandTimming::find($id);
        $mor_open = [];
        $mor_close = [];
        $noon_open = [];
        $noon_close = [];

        $mor_open['mon_mor_open'] =$request->mon_mor_open;
        $mor_open['tue_mor_open'] =$request->tue_mor_open;
        $mor_open['wed_mor_open'] =$request->wed_mor_open;
        $mor_open['thu_mor_open']  =$request->thu_mor_open;
        $mor_open['sun_mor_open']  =$request->sun_mor_open;

        if($request->mon_mor_close){
            $mor_close['mon_mor_close'] =$request->mon_mor_close;
        }
        if($request->tue_mor_close){
            $mor_close['tue_mor_close'] =$request->tue_mor_close;
        }
        if($request->wed_mor_close){
            $mor_close['wed_mor_close'] =$request->wed_mor_close;
        }
        if($request->thu_mor_close){
            $mor_close['thu_mor_close']  =$request->thu_mor_close;
        }
        if($request->sun_mor_close){
            $mor_close['sun_mor_close']  =$request->sun_mor_close;
        }

        if($request->mon_noon_open){
            $noon_open['mon_noon_open'] =$request->mon_noon_open;
        }
        if($request->tue_noon_open){
            $noon_open['tue_noon_open'] =$request->tue_noon_open;
        }
        if($request->wed_noon_open){
            $noon_open['wed_noon_open'] =$request->wed_noon_open;
        }
        if($request->thu_noon_open){
            $noon_open['thu_noon_open']  =$request->thu_noon_open;
        }
        if($request->sun_noon_open){
            $noon_open['sun_noon_open']  =$request->sun_noon_open;
        }

        $noon_close['mon_noon_close'] =$request->mon_noon_close;
        $noon_close['tue_noon_close'] =$request->tue_noon_close;
        $noon_close['wed_noon_close'] =$request->wed_noon_close;
        $noon_close['thu_noon_close']  =$request->thu_noon_close;
        $noon_close['sun_noon_close']  =$request->sun_noon_close;

        $brand_timming->sat_thu_mor_open = $mor_open;
        $brand_timming->sat_thu_mor_close = $mor_close; 
        $brand_timming->sat_thu_noon_open = $noon_open;
        $brand_timming->sat_thu_noon_close = $noon_close;
        $brand_timming->friday_open = $request->friday_open;
        $brand_timming->friday_close = $request->friday_close;
        $brand_timming->brand_profile_id = $request->id;
        $brand_timming->save();
        toastr()->success('Successfully Updated');
        return redirect('brand/brand_timming');
        } catch (\Exception $exception) {
            toastr()->error($exception->getMessage());
            return Redirect::back();
        }
    }

    public function destroy(Request $request , $id)
    {
        try {
                BrandTimming::FindorFail($id)->delete();
                toastr()->error('Successfully Deleted');
                return back();
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastr()->error($exception->getMessage());
            return Redirect::back();
        }
        
    }
}
