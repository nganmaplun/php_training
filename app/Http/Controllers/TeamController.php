<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Services\Interfaces\TeamServiceInterface;
use App\Services\Interfaces\UserServiceInterface;

class TeamController extends Controller
{
    protected $teamService;
    
    protected $userService;

    public function __construct(TeamServiceInterface $teamService, UserServiceInterface $userService)
    {
        $this->teamService = $teamService;
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = $this->teamService->getList();
        $users = $this->userService->getList();

        return view('teams.index', compact('teams', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->userService->getList;
        return view('teams.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->teamService->createTeam($request)) {
            Session::flash('success', 'Create a new Team successful');
        } else {
            Session::flash('error', 'Create new Team Failed ');
        }

        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $users = $this->userService->getList();
        return view('teams.edit', compact(['team', 'users']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Team $team, Request $request)
    {
       

        if($this->teamService->updateTeam($team, $request)){
            Session::flash('success', 'Update Team successfully');
        } else
        {
            Session::flash('fail', 'UpdateTeam failed');
        }

        return redirect()->route('teams.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        if($this->teamService->deleteTeam($team)){
            Session::flash('success', 'Delete Team successfully');
        } else
        {
            Session::flash('fail', 'Delete Team failed');
        }        return redirect()->route('teams.index');
    }
}
