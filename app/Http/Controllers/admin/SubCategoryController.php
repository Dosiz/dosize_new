<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Auth;
use Illuminate\Support\Facades\Redirect;

class SubCategoryController extends Controller
{
    public function index()
    {
        $sub_categories =  SubCategory::orderBy('id', 'DESC')->get();
        return view('admin.sub_category.index', compact('sub_categories'));
    }      

    public function create()
    {
        $categories =  Category::orderBy('id', 'DESC')->get();
        return view('admin.sub_category.add', compact('categories'));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $sub_category =  SubCategory::where('id',$id)->first();
        $categories =  Category::orderBy('id', 'DESC')->get();
        return view('admin.sub_category.edit', compact('sub_category','categories'));
        
    }

    public function store(Request $request)
    {
         // dd($request->all());
        $this->validate($request,[ 
            'name'=>'required',
            'category_id'=>'required', 
            'sub_category_slug'=>'required|unique:sub_categories,sub_category_slug,'.$request->id,
        ]);
        try {
        $sub_category= new  SubCategory;
        $sub_category->name = $request->name;
        $sub_category->category_id = $request->category_id;
        $sub_category->sub_category_slug = $request->sub_category_slug;
        $sub_category->save();
            return redirect('admin/sub-category');
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
            'category_id'=>'required', 
            // 'category_slug'=>'required|unique:sub_categories,sub_category_slug,'. $id, 
        ]);
        $sub_category=  SubCategory::find($id);
        $sub_category->category_id = $request->category_id;
        $sub_category->name = $request->name;
        $sub_category->sub_category_slug = $request->sub_category_slug;
        $sub_category->save();
        return redirect('admin/sub-category');
        
    }

    public function destroy($id)
    {
        try {
             SubCategory::FindorFail($id)->delete();
            return back();
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            return Redirect::back();
        }
    }
}
