<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'city_id' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'city_id' => $data['city_id'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole('User'); 
        return $user;
    }

    public function redirectTo()
    {
        if(Auth::user()->hasRole('Brand'))
        {
            $this->redirectTo = route('dashboard');

            return $this->redirectTo;
        }

        elseif(Auth::user()->hasRole('Manager'))
        {
            $this->redirectTo = route('dashboard');

            return $this->redirectTo;
        }

        elseif(Auth::user()->hasRole('Admin'))
        {
            $this->redirectTo = route('dashboard');

            return $this->redirectTo;
        }
        elseif(Auth::user()->hasRole('User'))
        {
            $user = User::where('id',Auth::id())->first();
            $url_components = parse_url($url); 
            $this->redirectTo = url($url_components['path']);
            toastr()->success('Successfully Register');

            return $this->redirectTo;
        }

        else
        {
            $url_components = parse_url($url); 
            $this->redirectTo = url($url_components['path']);

            return $this->redirectTo;
        }
    }
}
