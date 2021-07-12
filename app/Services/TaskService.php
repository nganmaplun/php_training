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
        $task = $timesheet->tasks()->create($request->all());
        return $task;
    }
    public function updateTask(Task $task, Request $request)
    {       
        $params = $request->all();

        return $task->update($params);
    }
    public function deleteTask(Task $task)
    {
        return $task->delete();
    }
}