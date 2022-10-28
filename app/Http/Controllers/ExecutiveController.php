<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class ExecutiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $executives = User::where('role','=','executive')->get();
        return view('executives',[
            'executives' => $executives
        ]);
    }

    public function create(){
        return view('createExecutive');
    }

    public function store(Request $request){
        $data = $request->all();
        $validation = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if($validation->fails()){
            return redirect()->back()->withInput()->withErrors($validation);
        }
        
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect('/executive');
    }
}
