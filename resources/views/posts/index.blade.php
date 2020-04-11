@extends('layout')

@section('content')

<h1>List of posts</h1>
<br>

<ul class="list-group">
    @forelse ($posts as $post)
    <li class="list-group-item">
    <p><a href="{{ route('posts.show',['post'=>$post->id]) }}">{{$post->title}}</a><p>
        <p>{{$post->content}}</p>
        <p>{{ $post->created_at->diffForHumans() }}</p>    
    <a  class="btn btn-warning" href="{{route('posts.edit',['post'=>$post->id])}}">Edit</a>    
    <form  style="display:inline" method="POST" action="{{route('posts.destroy',['post'=>$post->id])}}">
        @csrf
        @method('DELETE')
        <button  class="btn btn-danger" type="submit">Delete Post </button>
    </form>
    <li>
    @empty
    <span class="badge badge-danger">Not Posts<span>
    @endforelse
</ul>


    
@endsection