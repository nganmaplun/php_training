<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Users\RegisterRequest;
use Session;
use App\Models\Role;


class RegisterController extends Controller
{
    
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
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function register()
    {
       return view('auth.register');
    }

    protected function store(RegisterRequest $request)
    {
        $inputs = $request->all();
        $inputs['password'] = Hash::make($request->get('password'));
        $user = User::create($inputs);
        
        if ( $user ) {
            $user->roles()->attach(Role::USER);
            Session::flash('success', 'Register successful');
        } else {
            Session::flash('error', 'Register fail');
        }

        return redirect()->route('login');
    }
}
