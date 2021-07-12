<?php
namespace App\Services\Interfaces;

use App\Models\Timesheet;
use Illuminate\Http\Request;

interface TimesheetServiceInterface {
    public function getList();
    public function getListTimesheetOfAuth();
    public function viewTimesheetsOfTeam();
    public function createTimesheet(Request $request);
    public function updateTimesheet(Timesheet $timesheet, Request $request);
    public function deleteTimesheet(Timesheet $timesheet);
    public function export();
}