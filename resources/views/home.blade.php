@extends('layouts.app')

@section('content')
<div class="container">
          <br>
            <a href="/posts/create/" style="border-radius:40%;font-size:60px;font-family: 'Apple Chancery', cursive;padding:20px;color:#976444;text-decoration:unset;">+ <small>Add A Recipie!</small></a>

            <hr>
            @if(count($posts)>0)
                @foreach($posts as $post)
            <a href="posts/{{$post->id}}" id="post"><div class="card zoom">
                        <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                          <p class="card-text">written on {{$post->created_at}}</p>
                        </div>
                      </div>
                    </a>
                <br>
            
            
                @endforeach
                {{$posts->links()}}

                @else
                    <p style="font-family: 'Apple Chancery', cursive; font-size: 30px">You have no recipies yet!</p>
            @endif

</div>
@endsection
