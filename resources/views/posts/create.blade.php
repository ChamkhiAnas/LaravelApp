@extends('layout')
@section('content')

<h1>
    New Post
</h1>


<form  method="POST" action="{{route('posts.store')}}">
    @csrf
    @include('posts.form')

    <button class="btn btn-block btn-primary" type="submit">Add Post </button>

@if ($errors->any())
    <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}<li>
            @endforeach
    </ul> 
    
@endif
</form>



@endsection