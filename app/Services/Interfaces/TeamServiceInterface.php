<?php
namespace App\Services\Interfaces;

use App\Models\Team;
use Illuminate\Http\Request;

interface TeamServiceInterface {
    public function getList();
    public function createTeam(Request $request);
    public function updateTeam(Team $team, Request $request);
    public function deleteTeam(Team $team);
}