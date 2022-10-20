<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Task;
use App\Models\Status;
class API extends Controller
{
    public function fetchClients(){
        $result = [];
        $clients = Client::all();
        foreach($clients as $client){
            $result[$client->client_code] = $client->name;
        }
        return $result;
    }

    public function fetchTasks($id){
        $result = [];

        $tasks = Task::where('client_code','=',$id)->get();
        foreach($tasks as $task){
            $result[$task->id] = $task->task;
        }
        return $result;
    }

    public function verifyClient(Request $request){
        $data = $request->all();
        return Task::where('id','=',$data['task_id'])->where('client_code','=',$data['client_code'])->first();
    }

    public function verifyOtp(Request $request){
        $data = $request->all();
        return Client::where('client_code','=',$data['client_code'])->where('otp','=',$data['otp'])->first();
    }

    public function fetchStatus(Request $request){
        $data = $request->all();
        return Status::where('task_id','=',$data['task_id'])->get();
    }
}
