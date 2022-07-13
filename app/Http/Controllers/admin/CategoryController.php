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
        return view('admin.category.edit', compact('category'));
        
    }

    public function store(Request $request)
    {
         // dd($request->all());
        $this->validate($request,[ 
            'name'=>'required',
            'category_slug'=>'required|unique:categories,category_slug,'.$request->id,
        ]);
        try {
        $category= new  Category;
        $category->name = $request->name;  
        $category->category_slug = $request->category_slug;  
        $category->save();
            return redirect('admin/category');
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
            'category_slug'=>'required|unique:categories,category_slug,'.$id,
        ]);
        $category= Category::find($id);
        $category->name = $request->name;
        $category->category_slug = $request->category_slug; 
        $category->save();
        return redirect('admin/category');
        
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
