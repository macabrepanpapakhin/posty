@extends('layouts.app')


@section('content')

<div class="flex justify-center">
  <div class="w-8/12 ">
    <div class="p-6"><h1 class="text-2xl font-medium mb-1">{{$user->name}}</h1>
    <p> Posted {{$posts->count()}} {{Str::plural('post',$posts->count())}} and received {{$user->receivedLikes->count()}} likes</p>
  </div>
    <div class="bg-white rounded-lg p-6">
   @if($posts->count()>=1)
    @foreach($posts as $post)
    <x-post :post="$post" />
    @endforeach
    {{$posts->links()}}
    @else
    <p>{{$user->name}} has no posts!</p>
    @endif
    </div>
 </div>

</div>

@endsection