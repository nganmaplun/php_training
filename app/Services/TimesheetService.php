<?php
namespace App\Services;

use App\Models\Team;
use App\Models\Timesheet;
use App\Services\Service;
use Illuminate\Http\Request;
use App\Exports\TimesheetExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\Interfaces\TimesheetServiceInterface;

class TimesheetService extends Service implements TimesheetServiceInterface {
    public function getList()
    {
        $timesheets = Timesheet::all();
        return $timesheets;
    }
    public function getListTimesheetOfAuth()
    {
        $timesheets = Auth::user()->timesheets()->get();

        return $timesheets;
    }
    public function viewTimesheetsOfTeam()
    {
        $manager = Auth::user();
        $teams = Team::where('manager_id', $manager->id)->get();
        $team = $teams->first();
        $users = $team->users;

        return $users;
    }
    public function createTimesheet(Request $request)
    {   
        $params = [
            'date' => $request->get('date'),
            'problem' => $request->get('problem', 'Non Problem'),
            'plan' => $request->get('plan', 'Non Plan')
        ];
        $timesheet = Auth::user()->timesheets()->create($params);
        return $timesheet;
    }
    public function updateTimesheet(Timesheet $timesheet, Request $request)
    {
        $params = [
            'problem' => $request->get('problem', 'Non Problem'),
            'plan' => $request->get('plan', 'Non Plan')
        ];        
        return $timesheet->update($params);
    }
    public function deleteTimesheet(Timesheet $timesheet)
    {
        return $timesheet->delete();
    }

    public function export()
    {
        return Excel::download(new TimesheetExport, 'timesheet.xlsx');
    }
}