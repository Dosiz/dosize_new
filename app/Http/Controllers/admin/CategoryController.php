<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index()
    {
        $categories =  Category::orderBy('id', 'DESC')->get();
        return view('admin.category.index', compact('categories'));
    }      

    public function create()
    {
        return view('admin.category.add');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $category =  Category::where('id',$id)->first();
        $categories =  Category::orderBy('id', 'DESC')->get();
        return view('admin.category.edit', compact('category','categories'));
        
    }

    public function store(Request $request)
    {
         // dd($request->all());
        $this->validate($request,[ 
            'name'=>'required',
            'image'=>'required',
        ]);
        try {
        $category= new  Category;
        $category->name = $request->name;  
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move('category/',$image_name);
            $category->image=$image_name;
        } 
        $category->save();
            return redirect('admin/category');
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            return Redirect::back();
        }
    }

    public function update(Request $request,$id)
    {
        //   dd($request->all(),$id);
        $this->validate($request,[ 
            'name'=>'required',  
            // 'category_order_id'=>'required|unique:categories,category_order_id,'.$id,
        ]);
        $swap_cat_order_id= Category::where('category_order_id',$request->category_order_id)->first();
        if($swap_cat_order_id)
        {   
            $swap_cat_order_id->category_order_id = null;
            $swap_cat_order_id->save();
        }
        $category= Category::find($id);
        $category->name = $request->name; 
        $category->category_order_id = $request->category_order_id; 
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move('category/',$image_name);
            $category->image=$image_name;
        }
        if($category->save())
        {
            $swap_cat_order_ids= Category::find($swap_cat_order_id->id);
            $swap_cat_order_ids->category_order_id = $request->old_order_id;
            $swap_cat_order_ids->save();
            return redirect('admin/category');
        }
        
        
    }

    public function destroy($id)
    {
        try {
            Category::FindorFail($id)->delete();
            return back();
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            return Redirect::back();
        }
    }
}
