<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div>
        <div>
            @if (@isset($message))
                
            <div class="mx-auto alert {{$status ? 'alert-success' : 'alert-danger'}}">{{$message}}</div>
                
            @endif
        </div>
        <form action="/login" method="post">
            @csrf
            <div class="col-7 mx-auto border shadow p-3 my-4">
                <h4 class="text-center text-success">Login Page</h4>
                <input class="form-control mb-3" type="text" placeholder="email" name="email">
                <input class="form-control mb-3" type="text" placeholder="password" name="password">
                <button class="btn btn-success w-100">Login</button>
            </div>
        </form>
    </div>
</body>
</html>