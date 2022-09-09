<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use Auth;
use Illuminate\Support\Facades\Redirect;

class CityController extends Controller
{
    
    public function index()
    {
        $cities =  City::orderBy('id', 'DESC')->get();
        return view('admin.city.index', compact('cities'));
    }      

    public function create()
    {
        return view('admin.city.add');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $city =  City::where('id',$id)->first();
        return view('admin.city.edit_city', compact('city'));
        
    }

    public function store(Request $request)
    {
         // dd($request->all());
        $this->validate($request,[ 
            'name'=>'required',
            'hebrew_name'=>'required',
        ]);
        try {
        $city= new  City;
        $city->name = $request->name;
        $lower_name = Str::lower($request->name);
        $short_name = str_replace(' ', '-', $lower_name);
        // dd($short_name);
        $city->short_name = $short_name;
        $city->hebrew_name = $request->hebrew_name;
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move('city/',$image_name);
            $city->image=$image_name;
        }
        $city->save();
            return redirect('admin/city');
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            return Redirect::back();
        }
    }

    public function update(Request $request,$id)
    {
         // dd($request->all(),$id);
        $this->validate($request,[ 
            'name'=>'required',  
            'hebrew_name'=>'required',  
        ]);
        $city=  City::find($id);
        $city->name = $request->name;
        $lower_name = Str::lower($request->name);
        $short_name = str_replace(' ', '-', $lower_name);
        // dd($short_name);
        $city->short_name = $short_name;
        $city->hebrew_name = $request->hebrew_name;
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move('city/',$image_name);
            $city->image=$image_name;
        }
        $city->save();
        return redirect('admin/city');
        
    }

    public function destroy($id)
    {
        try {
             City::FindorFail($id)->delete();
            return back();
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            return Redirect::back();
        }
    }
}
