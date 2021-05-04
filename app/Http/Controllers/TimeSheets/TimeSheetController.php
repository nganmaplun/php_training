<?php

namespace App\Http\Controllers\TimeSheets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\TimeSheet;
use Illuminate\Support\Facades\Auth;

class TimeSheetController extends Controller
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
    public function store(Request $request)
    {
        $timesheet = new TimeSheet;
        $timesheet->user_id = Auth::id();
        $timesheet->date = $request->get('date');
        $timesheet->problem = $request->get('problem');
        $timesheet->plan = $request->get('plan');
        $timesheet->save();

        // Session::flash('success', 'Create new TimeSheet successfull');

        return redirect()->route('timesheets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TimeSheet $timesheet)
    {
       return view('timesheets.show', compact('timesheet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeSheet $timesheet)
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
    public function update(Request $request, TimeSheet $timesheet)
    {
        $inputs = $request->all();
        if (!isset($inputs['completed'])) $inputs['completed'] = false;
        $timesheet->update($inputs);

        return redirect()->route('timesheets.index')->with('message', 'Timesheet updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeSheet $timesheet)
    {
        $task->delete();

        return redirect()->route('timesheets.index')->with('message', 'Timesheet deleted successfully.');
    }
}
