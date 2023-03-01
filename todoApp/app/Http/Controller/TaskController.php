<?php

namespace App\Http\Controller;

use App\ContohBootcamp\Services\TaskService;
use App\Helpers\MongoModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller {
	protected $taskService;

  public function __construct(TaskService $taskService)
  {
    $this->taskService = $taskService;
  }

	public function showTasks()
	{
		$tasks = $this->taskService->getTasks();
		return response()->json($tasks);
	}

	public function createTask(Request $request)
	{
		$request->validate([
			'title'=>'required|string|min:3',
			'description'=>'required|string'
		]);

		$data = [
			'title'=>$request->post('title'),
			'description'=>$request->post('description')
		];

		$dataSaved = [
			'title'=>$data['title'],
			'description'=>$data['description'],
			'assigned'=>null,
			'subtasks'=> [],
			'created_at'=>time()
		];

		$id = $this->taskService->addTask($dataSaved);
		$task = $this->taskService->getById($id);

		return response()->json($task);
	}


	public function updateTask(Request $request) 
	{
		$request->validate([
			'task_id'=>'required|string',
			'title'=>'string',
			'description'=>'string',
			'assigned'=>'string',
			'subtasks'=>'array',
		]);

		$taskId = $request->post('task_id');
		$formData = $request->only('title', 'description', 'assigned', 'subtasks');
		$task = $this->taskService->getById($taskId);

		$this->taskService->updateTask($task, $formData);

		$task = $this->taskService->getById($taskId);

		return response()->json($task);
	}






	public function deleteTask($id)
    {
        $this->taskService->deleteTask($id);

        return response()->json([
            'message' => 'Task deleted successfully'
        ], 200);

				// return response()->json($id);
    }

    public function assignTask($id, Request $request)
    {
        $this->taskService->assignTask($id, $request->input('assigned'));

        return response()->json([
            'message' => 'Task assigned successfully'
        ], 200);
    }

    public function unassignTask($id)
    {
        $this->taskService->unassignTask($id);

        return response()->json([
            'message' => 'Task unassigned successfully'
        ], 200);
    }

    public function addSubTask($id, Request $request)
    {
        $this->taskService->addSubTask($id, $request->input('sub_task'));

        return response()->json([
            'message' => 'Sub task added successfully'
        ], 200);
    }

    public function deleteSubTask($id, Request $request)
    {
        $this->taskService->deleteSubTask($id, $request->input('sub_task_id'));

        return response()->json([
            'message' => 'Sub task deleted successfully'
        ], 200);
    }





	// TODO: deleteTask()
	// public function deleteTask(Request $request)
	// {
	// 	$mongoTasks = new MongoModel('tasks');
	// 	$request->validate([
	// 		'task_id'=>'required'
	// 	]);

	// 	$taskId = $request->task_id;

	// 	$existTask = $mongoTasks->find(['_id'=>$taskId]);

	// 	if(!$existTask)
	// 	{
	// 		return response()->json([
	// 			"message"=> "Task ".$taskId." tidak ada"
	// 		], 401);
	// 	}

	// 	$mongoTasks->deleteQuery(['_id'=>$taskId]);

	// 	return response()->json([
	// 		'message'=> 'Success delete task '.$taskId
	// 	]);
	// }

	// TODO: assignTask()
	// public function assignTask(Request $request)
	// {
	// 	$mongoTasks = new MongoModel('tasks');
	// 	$request->validate([
	// 		'task_id'=>'required',
	// 		'assigned'=>'required'
	// 	]);

	// 	$taskId = $request->get('task_id');
	// 	$assigned = $request->post('assigned');
	// 	$existTask = $mongoTasks->find(['_id'=>$taskId]);

	// 	if(!$existTask)
	// 	{
	// 		return response()->json([
	// 			"message"=> "Task ".$taskId." tidak ada"
	// 		], 401);
	// 	}

	// 	$existTask['assigned'] = $assigned;

	// 	$mongoTasks->save($existTask);

	// 	$task = $mongoTasks->find(['_id'=>$taskId]);

	// 	return response()->json($task);
	// }

	// TODO: unassignTask()
	// public function unassignTask(Request $request)
	// {
	// 	$mongoTasks = new MongoModel('tasks');
	// 	$request->validate([
	// 		'task_id'=>'required'
	// 	]);

	// 	$taskId = $request->post('task_id');
	// 	$existTask = $mongoTasks->find(['_id'=>$taskId]);

	// 	if(!$existTask)
	// 	{
	// 		return response()->json([
	// 			"message"=> "Task ".$taskId." tidak ada"
	// 		], 401);
	// 	}

	// 	$existTask['assigned'] = null;

	// 	$mongoTasks->save($existTask);

	// 	$task = $mongoTasks->find(['_id'=>$taskId]);

	// 	return response()->json($task);
	// }

	// TODO: createSubtask()
	// public function createSubtask(Request $request)
	// {
	// 	$mongoTasks = new MongoModel('tasks');
	// 	$request->validate([
	// 		'task_id'=>'required',
	// 		'title'=>'required|string',
	// 		'description'=>'required|string'
	// 	]);

	// 	$taskId = $request->post('task_id');
	// 	$title = $request->post('title');
	// 	$description = $request->post('description');

	// 	$existTask = $mongoTasks->find(['_id'=>$taskId]);

	// 	if(!$existTask)
	// 	{
	// 		return response()->json([
	// 			"message"=> "Task ".$taskId." tidak ada"
	// 		], 401);
	// 	}

	// 	$subtasks = isset($existTask['subtasks']) ? $existTask['subtasks'] : [];

	// 	$subtasks[] = [
	// 		'_id'=> (string) new \MongoDB\BSON\ObjectId(),
	// 		'title'=>$title,
	// 		'description'=>$description
	// 	];

	// 	$existTask['subtasks'] = $subtasks;

	// 	$mongoTasks->save($existTask);

	// 	$task = $mongoTasks->find(['_id'=>$taskId]);

	// 	return response()->json($task);
	// }

	// TODO deleteSubTask()
	// public function deleteSubtask(Request $request)
	// {
	// 	$mongoTasks = new MongoModel('tasks');
	// 	$request->validate([
	// 		'task_id'=>'required',
	// 		'subtask_id'=>'required'
	// 	]);

	// 	$taskId = $request->post('task_id');
	// 	$subtaskId = $request->post('subtask_id');

	// 	$existTask = $mongoTasks->find(['_id'=>$taskId]);

	// 	if(!$existTask)
	// 	{
	// 		return response()->json([
	// 			"message"=> "Task ".$taskId." tidak ada"
	// 		], 401);
	// 	}

	// 	$subtasks = isset($existTask['subtasks']) ? $existTask['subtasks'] : [];

	// 	// Pencarian dan penghapusan subtask
	// 	$subtasks = array_filter($subtasks, function($subtask) use($subtaskId) {
	// 		if($subtask['_id'] == $subtaskId)
	// 		{
	// 			return false;
	// 		} else {
	// 			return true;
	// 		}
	// 	});
	// 	$subtasks = array_values($subtasks);
	// 	$existTask['subtasks'] = $subtasks;

	// 	$mongoTasks->save($existTask);

	// 	$task = $mongoTasks->find(['_id'=>$taskId]);

	// 	return response()->json($task);
	// }

		




}