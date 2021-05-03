<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use Image;
class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('auth.profile',compact('user'));
    }
    public function update(UpdateRequest $request){
        $user = Auth::user();
        // dd($request->user()->name);

        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');

            $filename = time().'.'.$avatar->getClientOriginalExtension();

            Image::make($avatar)->resize(300, 300)->save(public_path('/images/avatars/'.$filename));

            $user->avatar = $filename;
        }
        if($user->name != $request->get('name'))
        {
            $user->name = $request->get('name');
        }
        if($user->mail != $request->get('mail'))
        {
            $user->mail = $request->get('mail');
        }
        $user->desc = $request->get('desc');
        
        return view('auth.profile',compact('user'));
    }
}
