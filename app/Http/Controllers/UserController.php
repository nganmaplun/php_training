<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Auth::user());
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', Auth::user());
        if ($user->delete()) {
            Session::flash('success', 'Delete task was successful');
        } else {
            Session::flash('error', 'Can not delete task!');
        }

        return redirect()->route('users.index', $user->id);
        
    }
}
