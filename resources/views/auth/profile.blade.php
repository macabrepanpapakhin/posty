@props(['user'=>$user])
@extends('layouts.app')


@section('content')
<div class='grid grid-cols-2'>

<div class="flex-col items-center w-full m-6">
    <div class="flex items-center relative">
      <form method="POST" action="/{{$user->id}}/update" enctype="multipart/form-data">

    @csrf
      
        <img class="w-32 h-32 rounded-full inline-block mr-6 mb-6 ml-6" src="{{$user->profile?asset('/storage/'.$user->profile):asset('/images/noimage.png')}}"  alt="user image"/>
       
                           @if(auth()->user()->id==$user->id)
                            <input
                                type="file"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="profile"
                                id="profile"
                            /> 
                            <a href="{{ route('removeprofile',$user)}} ">
                            <img src="/images/xbutton.png" alt='destroy image' class="absolute w-8 h-8 top-1 left-6"/>
                            </a>
                            @endif
</div>   
              
 
<div class="mb-4 w-1/2">
    <label for="name" class="sr-only">Name</label>
    <input type="text" name="name"  id="name"   @if(auth()->user()->id!=$user->id) readonly="readonly" @endif class="bg-gray-100 border-2 w-full p-4 rounded-lg  @error('name') border-red-500  @enderror" 
    value="{{$user->name}}">
    @error('name')
  <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
  
  @enderror
  </div>
  <div class="mb-4 w-1/2">
    <label for="name" class="sr-only">User Name</label>
    <input type="text" name="user_name"  id="user_name"  @if(auth()->user()->id!=$user->id) readonly="readonly"  @endif class="bg-gray-100 border-2 w-full p-4 rounded-lg  @error('user_name') border-red-500  @enderror" 
    value="{{$user->user_name}}">
    @error('user_name')
  <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
  
  @enderror
  </div>
  @if(auth()->user()->id!=$user->id)
  <div class="mb-4 w-1/2">
    <label for="name" class="sr-only">Email</label>
    <input type="email" name="email" readonly="readonly"  id="email" class="bg-gray-100 border-2 w-full p-4 rounded-lg  @error('user_name') border-red-500  @enderror" 
    value="{{$user->email}}">
    
   
  </div>
  @endif

  @if(auth()->user()->id==$user->id)
   <button type='submit' class="mb-4 w-1/2 text-white rounded-lg w-full bg-blue-500 mt-6 p-4">Save</button>
   @endif
    </form>
    <p class="mt-12"> Posted {{$posts->count()}} {{Str::plural('post',$posts->count())}} and received {{$user->receivedLikes->count()}} likes</p>
 
</div>
<div class="bg-white rounded-lg p-6 m-6">
   @if($posts->count()>=1)
    @foreach($posts as $post)
    <x-post :post="$post" />
    @endforeach
    {{$posts->links()}}
    @else
    <p>{{$user->name==auth()->user()->name?'You':$user->name}} has no posts!</p>
    @endif
    
</div>
</div>
@endsection