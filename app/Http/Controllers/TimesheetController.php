<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Team;
use App\Models\Timesheet;
use Illuminate\Http\Request;
use App\Exports\TimesheetExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Maatwebsite\Excel\Facades\Excel;
use App\Services\Interfaces\TimesheetServiceInterface;
use App\Http\Requests\Timesheets\StoreTimesheetRequest;

class TimesheetController extends Controller
{
    protected $timesheetService;

    public function __construct(TimesheetServiceInterface $timesheetService){
        $this->timesheetService = $timesheetService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Auth::user());
        $timesheets = $this->timesheetService->getList();

        return view('timesheets.index', compact('timesheets'));
    }

    public function list()
    {

        $timesheets = $this->timesheetService->getListTimesheetOfAuth();
        return view('timesheets.index', compact('timesheets'));
    }

    public function viewTimesheetsOfTeam()
    {
        $this->authorize('viewTeam', Timesheet::class, Auth::user());

        $users = $this->timesheetService->viewTimesheetsOfTeam();
        return view('timesheets.team', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('timesheets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTimesheetRequest $request)
    {
        $timesheet = $this->timesheetService->createTimesheet($request);
        if ($timesheet) {
            Session::flash('success', 'Create timesheets was successful!');
        } else {
            Session::flash('error', 'Can not create timesheets!');
        }
        return redirect()->route('timesheets.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Timesheet $timesheet)
    {
        return view('timesheets.show', compact('timesheet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Timesheet $timesheet)
    {
        $this->authorize('update', $timesheet);
        return view('timesheets.edit', compact('timesheet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Timesheet $timesheet, Request $request )
    {
        $this->authorize('update', $timesheet);
       
        if ($this->timesheetService->updateTimesheet($timesheet, $request)) {
            Session::flash('success', 'Edit timesheets was successful!');
        } else {
            Session::flash('error', 'Can not edit timesheets!');
        }
        return redirect()->route('timesheets.list');
    }

    public function export()
    {
        $this->authorize('export', Timesheet::class, Auth::user());
        return $this->timesheetService->export();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timesheet $timesheet)
    {
        $this->authorize('delete', $timesheet);
        
        if ($this->timesheetService->deleteTimesheet($timesheet)) {
            Session::flash('success', 'Delete timesheets was successful!');
        } else {
            Session::flash('error', 'Can not delete timesheets!');
        }

        return redirect()->route('timesheets.list');
    }
}
