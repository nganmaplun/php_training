<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Task;
use App\Models\Timesheet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\StoreTaskRequest;
use App\Services\Interfaces\TaskServiceInterface;

class TaskController extends Controller
{

    protected $taskService;

    public function __construct(TaskServiceInterface $taskService)
    {
        $this->taskService = $taskService;
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Timesheet $timesheet)
    {
        return view('tasks.create', compact('timesheet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Timesheet $timesheet, StoreTaskRequest $request)
    {
        if ( $this->taskService->createTask($timesheet, $request) ) {
            Session::flash('success', 'Create task was successful!');
        } else {
            Session::flash('error', 'Can not create task!');
        }
        
        return redirect()->route('timesheets.edit', $timesheet->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Timesheet $timesheet, Task $task)
    {
        return view('tasks.show', compact(['task', 'timesheet']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Timesheet $timesheet, Task $task)
    {
        return view('tasks.edit', compact(['timesheet','task']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Timesheet $timesheet,Task $task, Request $request)
    {

       if ( $this->taskService->updateTask($timesheet, $task, $request) ) {
            Session::flash('success', 'Edit task was successful!');
        } else {
            Session::flash('error', 'Can not Edit task!');
        }
       return redirect()->route('timesheets.tasks.show', [$timesheet->id, $task->id]); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        if ( $this->taskService->deleteTask($task) ) {
            Session::flash('success', 'Delete task was successful!');
        } else {
            Session::flash('error', 'Can not delete task!');
        }
        return redirect()->route('timesheets.list', $timesheet->id);
    }
}
