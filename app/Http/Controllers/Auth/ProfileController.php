<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
    public function index(User $user){
        $posts=$user->posts()->with(['user','likes'])->paginate(20);
        return view('auth.profile',['user'=>$user,'posts'=>$posts]);
    }

    public function removeprofile($user){

        $page = User::findOrFail($user);
        User::where('id',$user)->update(array('profile' => null));
         return back();
    }
    // public function getPosts(User $user){

    //     $posts=$user->posts()->with(['user','likes'])->paginate(20);
    //     // return view('users.posts.index',[
    //     //     'user'=>$user,
    //     //     'posts'=>$posts,
    //     // ]);

    // }

    public function updateprofile(Request $request,$id){

        $user=User::find($id);

        if($request->user_name==$user->user_name){
            $formfields=$request->validate([
              
                'name'=>'required|min:6|max:50',
            ]); 
        }
        else{
            $formfields=$request->validate([
            'user_name'=>['required',Rule::unique('users','user_name')],
            'name'=>'required|min:6|max:50',
        ]); 
        }

       

        if($request->hasFile('profile')){
            $formfields['profile']=$request->file('profile')->store('profiles','public');
        }

        $user->update($formfields);
        return redirect()->route('profile',$user);

    }
}
