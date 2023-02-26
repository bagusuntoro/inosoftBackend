<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function addTask($task)
    {
        return $this->taskRepository->addTask($task);
    }

    public function deleteTask($taskId)
    {
        return $this->taskRepository->deleteTask($taskId);
    }

    public function assignTask($taskId, $assignee)
    {
        return $this->taskRepository->assignTask($taskId, $assignee);
    }

    public function unassignTask($taskId)
    {
        return $this->taskRepository->unassignTask($taskId);
    }

    public function addSubTask($taskId, $subTask)
    {
        return $this->taskRepository->addSubTask($taskId, $subTask);
    }

    public function deleteSubTask($taskId, $subTaskId)
    {
        return $this->taskRepository->deleteSubTask($taskId, $subTaskId);
    }
}
