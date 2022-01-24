@extends('layouts.app')

@section('content')
<br>
<h1>{{$post->title}}</h1>
<div class="card-center mt-5" style="height:50%;width:50%;">
    <img  style="height:100%;width:100%;" src="/storage/cover_images/{{$post->cover_image}}">
</div>
<br>
<table>
<tr>
<td>{{$post->body}}</td>
</tr>
<hr>
</table>
<small>Written by {{$post->user->name}} on {{$post->created_at}}</small>
<br>

@if(Auth::check())
    @if(Auth::id()==$post->user->id)
<a href="/posts/{{$post->id}}/edit" class="button">Edit</a>

{!! Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'float-md-right']) !!}

<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">



{!! Form::hidden('_method', 'DELETE') !!}
    
    {!! Form::submit('Delete', ['class'=>'button']) !!}
    

{!! Form::close() !!}
    @endif
@endif
@endsection