<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class FrontEndController extends Controller
{
    public function landing_page()
    {
        $cities = City::get();
        return view('landing_page' , compact('cities'));
    }
}
