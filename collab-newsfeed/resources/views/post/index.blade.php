<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        @foreach ($posts as $post)
            <a href="{{ route('postShow', $post->id) }}"><li>{{$post->id}} {{$post->body}}</li></a>
            {{-- <li>{{$post->id}} {{$post->body}}</li> --}}
        @endforeach 
</body>
</html>