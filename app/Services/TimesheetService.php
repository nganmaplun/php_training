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
        $timesheet = Auth::user()->timesheets()->create($request->all());
        return $timesheet;
    }
    public function updateTimesheet(Timesheet $timesheet, Request $request)
    {
        $inputs = $request->all();
        
        return $timesheet->update($inputs);
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