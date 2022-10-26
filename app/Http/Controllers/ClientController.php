<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Client;
use App\Models\Status;
use App\Models\Task;

class ClientController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return Client::orderBy('id','DESC')->paginate();
    }
    
    public function create(){
        return view('createClient');
    }

    public function store(Request $request){
        $data = $request->all();
        $validation = Validator::make($data, [
            'name' => ['required','string'],
            'email' => ['required','email','unique:clients'],
            'number' => ['required','numeric','unique:clients'],
            'aadhar_number' => ['required','numeric','min:12','unique:clients'],
            'business_name' => ['required','string'],
            'otp' => ['required'],
            'address' => ['required'],
            'pincode' => ['required','numeric'],
            'team_size' => ['required','numeric'],
            'requirements' => ['required'],
            'notes' => ['required'],
            'client_code' => ['required','unique:clients'],
            'lead_source' =>  ['required'],
            'sales_person' =>  ['required'],
            'manager' => ['required'],
            'technical_person' => ['required'],
            'date_of_start' => ['required']
        ]); 

        if($validation->fails()){
            return redirect()->back()->withInput()->withErrors($validation);
        }   
        // dd($data);
        $client = Client::create($data);
        return redirect('/admin');
    }

    public function show($id){
        $client = Client::FindOrFail($id)->first();
        $tasks = Task::where('client_code','=',$client->client_code)->orderBy('created_at', 'DESC')->get();
        foreach($tasks as $task){
            $status = Status::where('task_id','=',$task->id)->orderBy('id','DESC')->get();
            $task->status = $status;
        }
        return view('showClient',[
            'client' => $client,
            'tasks' => $tasks
        ]);
    }
}
