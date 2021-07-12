<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Interfaces\UserServiceInterface;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        $this->authorize('viewAny', Auth::user());
        $users = $this->userService->getList();

        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', Auth::user());
        if ($this->userService->deleteUser($user)) {
            Session::flash('success', 'Delete task was successful');
        } else {
            Session::flash('error', 'Can not delete task!');
        }

        return redirect()->route('users.index', $user->id);
        
    }
}
