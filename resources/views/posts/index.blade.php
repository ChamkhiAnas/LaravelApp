@extends('layout')

@section('content')

<h1>List of posts</h1>
<br>

<ul>
    @foreach ($posts as $post)
        
    <li>
       <p> {{$post->title}} <p>
        <p>{{$post->content}}</p>
        <p>{{$post->created_at}}</p>   
    <li>
    @endforeach
</ul>

    
@endsection