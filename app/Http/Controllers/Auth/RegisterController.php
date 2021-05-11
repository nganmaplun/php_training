<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterRequest;


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
    public function create()
    {
       return view('auth.register');
    }

    protected function store(RegisterRequest $request)
    {
        $inputs = $request->all();
        $inputs['password'] = Hash::make($data['password']);

        if ( $user = User::create($inputs) ) {
            Session::flash('success', 'Register successful');
        } else {
            Session::flash('error', 'Register fail');
        }

        return redirect()->route('home');
    }
}
