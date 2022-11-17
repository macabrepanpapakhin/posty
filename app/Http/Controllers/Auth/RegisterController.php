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
            'user_name'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed'
        ]);

        if($request->hasFile('profile')){
           $formdata['profile']=$request->file('profile')->store('profiles','public');
           //dd("hasfile");
        }
        $formdata['password']=bcrypt($formdata['password']);
        User::create($formdata);
        // User::create([
        //     'name'=>$formdata['name'],
        //     'user_name'=>$formdata['username'],
        //     'email'=>$formdata['email'],
        //     'password'=>Hash::make($formdata['password']),

        // ]);
        auth()->attempt($request->only('email','password'));
        return redirect()->route('dashboard');
    }
}
