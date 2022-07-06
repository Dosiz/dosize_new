<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::where('id',Auth::id())->first();
        if(Auth::user()->hasRole('Admin'))
        {
            return view('admin.dashboard.index',compact('user'));
        }
        elseif(Auth::user()->hasRole('Brand'))
        {
            return view('brand.dashboard.index',compact('user'));
        }
        elseif(Auth::user()->hasRole('Manager'))
        {
            return view('manager.dashboard.index',compact('user'));
        }
        else
        {
            return view('landing_page');
        }
    }
}
