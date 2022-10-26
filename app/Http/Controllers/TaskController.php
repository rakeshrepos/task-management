<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\ExecutiveClientTasks;
class TaskController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create(){
        return view('createTask');
    }

    public function store(Request $request){
        $data = $request->all();
        $task = Task::create([
            'client_code' => $data['client_code'],
            'task' => $data['task'],
            ]
        );

        return ExecutiveClientTasks::create([
            'executive' => $data['executive'],
            'client_code' => $data['client_code'],
            'task_id' => $task->id
        ]);
    }
}
