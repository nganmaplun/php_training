<?php
namespace App\Services;

use App\Models\Task;
use App\Models\Timesheet;
use App\Services\Service;
use Illuminate\Http\Request;
use App\Services\Interfaces\TaskServiceInterface;

class TaskService extends Service implements TaskServiceInterface {
    
    public function createTask(Timesheet $timesheet, Request $request)
    {
        $params = [
            'name' => $request->get('name'),
            'desc' => $request->get('desc', 'No Desc'),
            'use_time' => $request->get('use_time'),

        ];
        $task = $timesheet->tasks()->create($params);
        return $task;
    }
    public function updateTask(Timesheet $timesheet, Task $task, Request $request)
    {       
        $params = [
            'name' => $request->get('name'),
            'desc' => $request->get('desc', 'No Desc'),
            'use_time' => $request->get('use_time'),

        ];
        $task->update($params);
        return $task;
    }
    public function deleteTask(Timesheet $timesheet, Task $task)
    {
        return $task->delete();
    }
}