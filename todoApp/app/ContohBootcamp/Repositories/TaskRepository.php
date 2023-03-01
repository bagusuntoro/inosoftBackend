<?php
namespace App\ContohBootcamp\Repositories;

use App\Helpers\MongoModel;

class TaskRepository
{
	private MongoModel $tasks;
	public function __construct()
	{
		$this->tasks = new MongoModel('tasks');
	}

	/**
	 * Untuk mengambil semua tasks
	 */
	public function getAll()
	{
		$tasks = $this->tasks->get([]);
		return $tasks;
	}

	/**
	 * Untuk mendapatkan task bedasarkan id
	 *  */
	public function getById(string $id)
	{
		$task = $this->tasks->find(['_id'=>$id]);
		return $task;
	}

	/**
	 * Untuk membuat task
	 */
	public function create(array $data)
	{
		$dataSaved = [
			'title'=>$data['title'],
			'description'=>$data['description'],
			'assigned'=>null,
			'subtasks'=> [],
			'created_at'=>time()
		];

		$id = $this->tasks->save($dataSaved);
		return $id;
	}

	/**
	 * Untuk menyimpan task baik untuk membuat baru atau menyimpan dengan struktur bson secara bebas
	 *  */
	public function save(array $editedData)
	{
		$id = $this->tasks->save($editedData);
		return $id;
	}


	// project assignment
	public function deleteTask($id)
	{
			$this->tasks->where('_id', $id)->delete();
	}

	public function assignTask($id, $assignedTo)
	{
			$this->tasks->where('_id', $id)->update(['assigned' => $assignedTo]);
	}

	public function unassignTask($id)
	{
			$this->tasks->where('_id', $id)->update(['assigned' => null]);
	}
	public function addSubTask($id, $subTask)
	{
			$this->tasks->where('_id', $id)->push('sub_tasks', $subTask);
	}

	public function deleteSubTask($id, $subTaskId)
	{
			$this->tasks->where('_id', $id)->pull('sub_tasks', ['_id' => $subTaskId]);
	}
}