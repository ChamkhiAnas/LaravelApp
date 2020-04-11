<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/theme.css') }}"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    @if(session()->has('status'))
        <h3 style="color:green">
            {{session()->get('status')}}
        </h3>

    @endif
 

    <nav class="navbar navbar-expand navbar-dark bg-success">
        <ul class="nav navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ route('posts.index')}}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('about')}}">About</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('posts.create')}}">New Post</a></li>        
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>
    <script  src="{{mix('/js/app.js')}}"></script>



</body>
</html>