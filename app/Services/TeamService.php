<?php
namespace App\Services;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Services\Interfaces\TeamServiceInterface;

class TeamService extends Service implements TeamServiceInterface
{
    public function getList()
    {

        return Team::all();
    }
    public function createTeam(Request $request)
    {
        $params = [
            'name' => $request->get('name'),
            'manager_id' => $request->get('manager')
        ];

        $team = Team::create($params);
        if ($team) {
            $team->users()->attach($request->get('members'));
            return 1;
        } else {
            return 0;
        }

    }
    public function updateTeam(Team $team, Request $request)
    {
        
        $params = [
            'name' => $request->get('name'),
            'manager_id' => $request->get('manager'),
        ];

        if($team->update($params)){
            $team->users()->sync($request->get('members'));
            return 1;
        } else
        {
            return 0;
        }
    }
    public function deleteTeam(Team $team)
    {
        return $team->delete();
    }
}