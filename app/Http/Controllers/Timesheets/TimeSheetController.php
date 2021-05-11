<?php

namespace App\Http\Controllers\Timesheets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Timesheet;
use App\Http\Requests\StoreTimesheetRequest;

use Illuminate\Support\Facades\Auth;
use Session;

class TimesheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timesheets = Timesheet::all();

        return view('timesheets.index', compact('timesheets'));
    }

    public function list()
    {
        $timesheets = Auth::user()->timesheets()->get();

        return view('timesheets.index', compact('timesheets'));
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
        if ( $timesheet = Auth::user()->timesheets()->create($request->all()) ) {
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
        return view('timesheets.edit', compact('timesheet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timesheet $timesheet)
    {
        $inputs = $request->all();
        if (!isset($inputs['completed'])) $inputs['completed'] = false;
        if ($timesheet->update($inputs)) {
            Session::flash('success', 'Edit timesheets was successful!');
        } else {
            Session::flash('error', 'Can not edit timesheets!');
        }
        return redirect()->route('timesheets.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timesheet $timesheet)
    {
        if ($timesheet->delete()) {
            Session::flash('success', 'Delete timesheets was successful!');
        } else {
            Session::flash('error', 'Can not delete timesheets!');
        }
        
        return redirect()->route('timesheets.list');
    }
}
