<?php

namespace App\Http\Controllers;

use App\Services\TaskService;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function deleteTask($id)
    {
        $this->taskService->deleteTask($id);
        return redirect()->back();
    }

    public function assignTask($id, $userId)
    {
        $this->taskService->assignTask($id, $userId);
        return redirect()->back();
    }

    public function unassignTask($id)
    {
        $this->taskService->unassignTask($id);
        return redirect()->back();
    }

    public function createSubtask($id, $subtaskData)
    {
        $this->taskService->createSubtask($id, $subtaskData);
        return redirect()->back();
    }

    public function deleteSubtask($id)
    {
        $this->taskService->deleteSubtask($id);
        return redirect()->back();
    }
}