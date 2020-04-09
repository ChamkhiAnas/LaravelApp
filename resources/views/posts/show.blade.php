@extends('layout')

@section('content')

    
       <h1> {{$post->title}} <h1>
        <p>{{$post->content}}</p>
        <p>{{ $post->created_at->diffForHumans() }}</p>   
       <p>Statut: @if ($post->active==0)
       Enabled
       @else
       Disabled
       @endif
       </p>
    
@endsection