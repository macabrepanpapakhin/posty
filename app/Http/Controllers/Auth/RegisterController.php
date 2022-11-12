<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }


    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        $formdata=$request->validate([
            'name'=>'required|max:255',
            'username'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed'
        ]);

        User::create([
            'name'=>$formdata['name'],
            'user_name'=>$formdata['username'],
            'email'=>$formdata['email'],
            'password'=>Hash::make($formdata['password']),

        ]);
        auth()->attempt($request->only('email','password'));
        return redirect()->route('dashboard');
    }
}
