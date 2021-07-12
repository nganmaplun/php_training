<?php
namespace App\Services\Interfaces;

use App\Models\Task;
use App\Models\Timesheet;
use Illuminate\Http\Request;

interface TaskServiceInterface {
    public function createTask(Timesheet $timesheet, Request $request);
    public function updateTask(Task $task, Request $request);
    public function deleteTask(Task $task);
}