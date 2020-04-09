@extends('layout')

@section('content')

<h1>List of posts</h1>
<br>

<ul>
    @forelse ($posts as $post)
    <li>
    <p><a href="{{ route('posts.show',['post'=>$post->id]) }}">{{$post->title}}</a><p>
        <p>{{$post->content}}</p>
        <p>{{ $post->created_at->diffForHumans() }}</p>    
        {{$post->id}}
    <li>
    @empty
    <p>Not Posts<p>
    @endforelse
</ul>

    
@endsection