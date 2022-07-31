<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminProduct;
use Auth;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index()
    {
        $admin_products =  AdminProduct::orderBy('id', 'DESC')->get();
        return view('admin.admin_product.index', compact('admin_products'));
    }      

    public function create()
    {
        return view('admin.admin_product.add');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $admin_product =  AdminProduct::where('id',$id)->first();
        return view('admin.admin_product.edit', compact('admin_product'));
        
    }

    public function store(Request $request)
    {
         // dd($request->all());
        $this->validate($request,[ 
            'name'=>'required',
            'image'=>'required', 
            'price'=>'required',  
            'description'=>'required',
        ]);
        try {
        $admin_product= new  AdminProduct;
        $admin_product->name = $request->name;
        $admin_product->price = $request->price;
        $admin_product->description = $request->description;
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move('admin_product/',$image_name);
            $admin_product->image=$image_name;
        }
        $admin_product->save();
            return redirect('admin/admin_product');
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
            'price'=>'required',  
            'description'=>'required', 
        ]);
        $admin_product=  AdminProduct::find($id);
        $admin_product->name = $request->name;
        $admin_product->price = $request->price;
        $admin_product->description = $request->description;
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move('admin_product/',$image_name);
            $admin_product->image=$image_name;
        }
        $admin_product->save();
        return redirect('admin/admin_product');
        
    }

    public function destroy($id)
    {
        try {
            AdminProduct::FindorFail($id)->delete();
            @unlink(public_path()."/admin_product/".$filePath->image );
            return back();
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            return Redirect::back();
        }
    }
}
