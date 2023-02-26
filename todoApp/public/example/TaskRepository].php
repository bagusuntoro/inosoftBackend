<?php

namespace App\Repositories;

use App\Task;

class TaskRepository
{
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function addTask($task)
    {
        return $this->task->create($task);
    }

    public function deleteTask($taskId)
    {
        return $this->task->findOrFail($taskId)->delete();
    }

    public function assignTask($taskId, $assignee)
    {
        $task = $this->task->findOrFail($taskId);
        $task->assignee = $assignee;
        $task->save();

        return $task;
    }

    public function unassignTask($taskId)
    {
        $task = $this->task->findOrFail($taskId);
        $task->assignee = null;
        $task->save();

        return $task;
    }

    public function addSubTask($taskId, $subTask)
    {
        $task = $this->task->findOrFail($taskId);
        $subTask = $task->subTasks()->create($subTask);

        return $subTask;
    }

    public function deleteSubTask($taskId, $subTaskId)
    {
        $task = $this->task->findOrFail($taskId);
        return $task->subTasks()->findOrFail($subTaskId)->delete();
    }
}
