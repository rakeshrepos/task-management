<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Task;
use App\Models\Status;
use App\Models\User;
use App\Models\ExecutiveClientTasks;
use Auth;
class API extends Controller
{
    
    public function fetchClients($executive_id){
        $result = [];
        $user = User::find($executive_id);
        if($user->role == 'admin'){
            $clients = Client::all();
        }
        else{
        
            $clients_code = ExecutiveClientTasks::select('client_code')->where('executive','=',$executive_id)->get();
            $clients = Client::select('client_code','name')->whereIn('client_code',$clients_code)->get();
        }
        foreach($clients as $client){
            $result[$client->client_code] = $client->name;
        }
        return $result;
    }

    public function fetchExecutives(){
        $result = [];
        $clients = User::where('role','=','executive')->get();
        foreach($clients as $client){
            $result[$client->id] = $client->name;
        }
        return $result;
    }

    public function fetchTasks($client_code,$executive_id){
        $result = [];
        $user = User::find($executive_id);
        if($user->role == 'admin'){
            $tasks = Task::where('client_code','=',$client_code)->get();
        }else{
            $tasks_id= ExecutiveClientTasks::select('task_id')->where('client_code','=',$client_code)->where('executive','=',$executive_id)->get();
            $tasks = Task::select('id','task')->whereIn('id',$tasks_id)->get();
        }
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
