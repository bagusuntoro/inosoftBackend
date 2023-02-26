<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controller\TaskController;
use App\Http\Controllers\AuthController;


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    
    Route::prefix('task')->group(function() {
        Route::get('/show_tasks', [TaskController::class, 'showTasks']);
        Route::post('/create_task', [TaskController::class, 'createTask']);
        Route::put('/update_task/{id}', [TaskController::class, 'updateTask']);
    
        // NOTE: lanjutkan tugas assignment di routing baru dibawah ini
        Route::delete('/delete_task/{id}', [TaskController::class, 'deleteTask']);
        Route::post('/assign_task', [TaskController::class, 'assignTask']);
        Route::delete('/unassign_task', [TaskController::class, 'unassignTask']);
        Route::post('/create_subtask', [TaskController::class, 'createSubtask']);
        Route::delete('/delete_subtask', [TaskController::class, 'deleteSubtask']);
    });
});
