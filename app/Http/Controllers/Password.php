<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class Password extends Controller
{
    //

    public function edit(){
        $email = Auth::user()->email;
        return view('updatePassword',[
            'email' => $email
        ]);
    }

    public function update(Request $request){
        $data = $request->all();
        $validation = Validator::make($data, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if($validation->fails()){
            return redirect()->back()->withInput()->withErrors($validation);
        }
        $password = Hash::make($data['password']);
        $user = User::find(Auth::user()->id);
        $user->password = $password;
        $user->save();

        return view('updatePassword',[
            'email' => $user->email,
            'status'=>'Passowrd updated sucessfully!!!']);
    }
}
