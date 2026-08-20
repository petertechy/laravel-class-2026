<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{-- <h1>Welcome to Laravel Class - {{$name}}</h1> --}}
    {{-- <h1>Age is {{$age}}</h1> --}}


    <ul>
        @foreach ($myFruits as $fruit)
            <li>{{$fruit}}</li>
        @endforeach
    </ul>
</body>
</html>