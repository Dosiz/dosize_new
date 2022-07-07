<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\BrandProfile; 
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
        )->get();
        
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

    public function update_user_status(Request $request,$id)
    {
        $user = User::where('id',$id)->first();
        \DB::table('model_has_roles')->where('model_id', $id)->update( ['role_id' => '3']); 

        return Redirect::back();
        
    }

    public function update_brand(Request $request,$id)
    {
        // dd($request->status);
        // try {

            $brand_profile= BrandProfile::where('id',$id)->first();
            if($brand_profile->status == '0'){
            $brand_profile->status = 1;
            }
            else{
                $brand_profile->status = 0;
            }
            $brand_profile->update();
            return redirect('admin/brands');
            
            // } catch (\Exception $exception) {
            //     // dd($exception->getMessage());
            //     return Redirect::back();
            // }
        
    }
}
