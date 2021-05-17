<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Users\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use Image;
use Session;

class ProfileController extends Controller
{

    public function show(){
        $user = Auth::user();
        return view('auth.profile',compact('user'));
    }
    public function edit(){
        $user = Auth::user();
        return view('auth.edit', compact('user'));
    }

    public function update(UpdateProfileRequest $request){
        $user = Auth::user();
        $inputs = $request->all();
        if($request->hasFile('avatar'))
        {
            $inputs['avatar'] = $this->handleAvatar($request);
        }
        if ( $user->update($inputs) ) {
            Session::flash('success', 'Update profile was successful!');
        } else {
            Session::flash('error', 'Can not update profile!');
        }
        return redirect('profile');
    }

    public function handleAvatar(UpdateProfileRequest $request){
        $avatar = $request->file('avatar');
        $filename = time().'.'.$avatar->getClientOriginalExtension();
        $request->avatar->move(public_path('images/avatars'), $filename);

        return $filename;
    }

}
