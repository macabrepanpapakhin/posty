@extends('layouts.app')


@section('content')

<div class="flex justify-center">
  <div class="w-4/12 bg-white p-6 mt-5 rounded-lg">
   <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="mb-4">
    <label for="name" class="sr-only">Name</label>
    <input type="text" name="name" id="name" placeholder="Your Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg  @error('name') border-red-500  @enderror" 
    value="{{old('name')}}">
  @error('name')
  <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
  
  @enderror
  </div>
  <div class="mb-4">
    <label for="username" class="sr-only">User Name</label>
    <input type="text" name="user_name" id="user_name" placeholder="User Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg  @error('username') border-red-500  @enderror" value="{{old('user_name')}}">
    @error('user_name')
  <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
  
  @enderror
  </div>
  <div class="mb-4">
    <label for="name" class="sr-only">Email</label>
    <input type="email" name="email" id="email" placeholder="Your Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg  @error('email') border-red-500  @enderror" value="{{old('email')}}">
    @error('email')
  <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
  
  @enderror
  </div>
  <div class="mb-4">
    <label for="name" class="sr-only">Password</label>
    <input type="password" name="password" id="password" placeholder="Choose password" class="bg-gray-100 border-2 w-full p-4 rounded-lg  @error('password') border-red-500  @enderror" value="{{old('password')}}">
    @error('password')
  <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
  
  @enderror
  </div>
  <div class="mb-4">
    <label for="name" class="sr-only">Confirmed Password</label>
    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat the Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg  @error('password') border-red-500  @enderror" value="{{old('password_confirmation')}}">
    @error('password_confirmation')
  <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
  
  @enderror
                        <div class="mb-6">
                            <label for="profile" class="inline-block text-lg mb-2 mt-2">
                               Profile Image
                            </label>
                            <input
                                type="file"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="profile"
                                id="profile"
                            />
                        </div>
  </div>
  <div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
  </div>
   </form>
   
  </div>
</div>

@endsection