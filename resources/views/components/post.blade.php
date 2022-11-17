@props(['post'=>$post])
<div class="mb-4">
<a href="{{ route('profile',$post->user) }}">
  
  <img class="w-12 h-12 rounded-full inline-block mr-6" src="{{$post->user->profile?asset('/storage/'.$post->user->profile):asset('/images/noimage.png')}}"  alt="user image"/>
      <!-- <a href="{{ route('users.posts',$post->user) }}" class="font-bold mb-6 mr-6">{{$post->user->name}}</a> -->
</a>
      <a href="{{ route('profile',$post->user) }}" class="font-bold mb-6 mr-6">{{$post->user->name}}</a>
      <span class="text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span>
      <p class="mb-2 p-6 pl-0  leading-8">{{$post->body}}</p>
      <div>
      
      </div>
     <div class="flex items-center">
      @auth
      @can('delete',$post)
      <form action="{{ route('posts.destroy',$post) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-blue-500 mr-1">Delete</button>
      </form> 
    @endcan
      @if(!$post->likedBy(auth()->user()))
      <form action="{{ route('posts.likes',$post->id) }}" method="post" class="mr-1">
        @csrf
        <button type="submit" class="text-blue-500">Like</button>
      </form>
      @else
      <form action="{{ route('posts.likes',$post->id)}}" method="post" class="mr-1">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-blue-500">Unlike</button>
      </form>
      @endif

     
      @endauth
      <span>{{$post->likes->count()}} {{Str::plural('like',$post->likes()->count())}}</span>
     </div>
    </div>
