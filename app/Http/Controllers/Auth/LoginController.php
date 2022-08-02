<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        logout as performLogout;
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('landing-page',1);
    }

    

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        if(Auth::user()->hasRole('Admin'))
        {
            $user = User::where('id',Auth::id())->first();
            $this->redirectTo = route('dashboard');

            return $this->redirectTo;
        }

        elseif(Auth::user()->hasRole('Brand'))
        {
            $user = User::where('id',Auth::id())->first();
            $this->redirectTo = route('dashboard');

            return $this->redirectTo;
        }

        elseif(Auth::user()->hasRole('Manager'))
        {
            $user = User::where('id',Auth::id())->first();
            $this->redirectTo = route('dashboard');

            return $this->redirectTo;
        }
        elseif(Auth::user()->hasRole('User'))
        {
            $user = User::where('id',Auth::id())->first();
            $city_id = 5;
            $this->redirectTo = url('/',$city_id);
            toastr()->success('Successfully Updated');
            return $this->redirectTo;
            // return response()->json(['success'=>'Blog Comment saved successfully' , 'comment' => $request->comment,'name'=>$blog_user_name]);
        }
        else
        {
            $this->redirectTo = route('landing-page',1);

            return $this->redirectTo;

        }
    }
}
