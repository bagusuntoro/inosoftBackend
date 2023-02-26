<?php

namespace App\ContohBootcamp\Services;

use App\ContohBootcamp\Repositories\TaskRepository;

class TaskService {
	protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

	/**
	 * NOTE: untuk mengambil semua tasks di collection task
	 */
	public function getTasks()
	{
		$tasks = $this->taskRepository->getAll();
		return $tasks;
	}

	/**
	 * NOTE: menambahkan task
	 */
	public function addTask(array $data)
	{
		$taskId = $this->taskRepository->create($data);
		return $taskId;
	}

	/**
	 * NOTE: UNTUK mengambil data task
	 */
	public function getById(string $taskId)
	{
		$task = $this->taskRepository->getById($taskId);
		return $task;
	}

	/**
	 * NOTE: untuk update task
	 */
	public function updateTask(array $editTask, array $formData)
	{
		if(isset($formData['title']))
		{
			$editTask['title'] = $formData['title'];
		}

		if(isset($formData['description']))
		{
			$editTask['description'] = $formData['description'];
		}

		$id = $this->taskRepository->save( $editTask);
		return $id;
	}



	// project assignment
	public function deleteTask($id)
    {
        $this->taskRepository->deleteTask($id);
    }

    public function assignTask($id, $assignedTo)
    {
        $this->taskRepository->assignTask($id, $assignedTo);
    }

    public function unassignTask($id)
    {
        $this->taskRepository->unassignTask($id);
    }

    public function addSubTask($id, $subTask)
    {
        $this->taskRepository->addSubTask($id, $subTask);
    }

    public function deleteSubTask($id, $subTaskId)
    {
        $this->taskRepository->deleteSubTask($id, $subTaskId);
    }


}