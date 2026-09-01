<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>My Dashboard</h1>

    <div>
        <h1>Name: {{$user->name ?? 'Not Provided'}}</h1>
        <h1>Age: {{$user->age ?? 'Not Provided'}}</h1>
        <h1>Phone No: {{$user->phone_number ?? 'Not Provided'}}</h1>
        <h1>Email: {{$user->email ?? 'Not Provided'}}</h1>
    </div>

    <form action="/logout" method="post">
        @csrf
        <button>Logout</button>
    </form>
</body>
</html>