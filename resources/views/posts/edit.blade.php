@extends('layout')
@section('content')


<h1>
    Edit Post
</h1>

<form  method="POST" action="{{route('posts.update',['post'=>$post->id])}}">
    @csrf
    @method('PUT')
    @include('posts.form')




    <button class="btn btn-block btn-warning" type="submit">Update Post </button>

@if ($errors->any())
    <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}<li>
            @endforeach
    </ul> 
    
@endif
</form>



@endsection