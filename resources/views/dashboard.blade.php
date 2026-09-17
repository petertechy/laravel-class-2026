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
    <form action="/logout" method="post">
        @csrf
        <button>Logout</button>
    </form>

    <div>
        <h1>Name: {{$user->name ?? 'Not Provided'}}</h1>
        <h1>Age: {{$user->age ?? 'Not Provided'}}</h1>
        <h1>Phone No: {{$user->phone_number ?? 'Not Provided'}}</h1>
        <h1>Email: {{$user->email ?? 'Not Provided'}}</h1>
    </div>

    <table class="table">
        <thead>
            <tr><th>Name</th><th>Email</th><th>Phone</th><th>Age</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @foreach ($users as $u)
            <tr>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->phone_number }}</td>
                <td>{{ $u->age }}</td>
                <td>
                    <a href="/users/{{ $u->id }}/edit">Edit</a>
        <form action="/users/{{ $u->id }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Delete this user?')">Delete</button>
        </form>
        </td>
        </tr>
            @endforeach
        </tbody>
        </table>
{{ $users->links() }} {{-- pagination --}}

    
</body>
</html>