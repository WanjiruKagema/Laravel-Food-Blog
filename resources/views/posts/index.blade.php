@extends('layouts.app')

@section('content')
<br>
<h1>Posts</h1>
<hr>
@if(count($posts)>0)
    @foreach($posts as $post)
      
      <a href="posts/{{$post->id}}" id="post">
  
      <div class="row border zoom" >
          <span><img  style="height: 100px;width:100px;" src="storage/cover_images/{{$post->cover_image}}" /></span>
            <span style="padding:20px;"><h5 class="card-title">{{$post->title}}</h5>
            </span>
            <p style="margin-right:5px;margin-bottom:0;margin-left:auto;margin-top:auto;"><small>...by {{$post->user->name}}</small></p>

            </div>
      </a>
    


    <br>


    @endforeach
    {{$posts->links()}}
    @else
        <p>No posts</p>
@endif
@endsection