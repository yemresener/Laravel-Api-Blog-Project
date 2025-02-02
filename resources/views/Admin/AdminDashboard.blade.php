<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/Admin.css') }}">

</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div>
                <h2>Dashboard</h2>
                <a href="{{route('unConfirm')}}">Unconfirmed Posts</a>
                <a href="{{route('home')}}">Update Posts</a>
                <a href="{{route('home')}}">Home</a>
            </div>
            <div class="footer">&copy; 2025 Dashboard</div>
        </div>

        <!-- Main Content -->
        <div class="content">
            <h1>Welcome to Your Dashboard</h1>

            <div class="summary">
                <div class="summary-card">
                    <h3>Unconfirmed Posts</h3>
                    <p>{{$unconfirm_post}}</p>
                </div>
                <div class="summary-card">
                    <h3>Users</h3>
                    <p>{{$users->count()}}</p>
                </div>
                <div class="summary-card">
                    <h3>Total Views</h3>
                    <p>{{$views}}</p>
                </div>
            </div>

            <div class="card">
                <h3>Users</h3>
                <table class="table">
                    <thead>
                        <tr>

                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Post Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $u)
                            
                        
                        <tr>
                            <td>{{ $u->id }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->getPosts->count() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>
</html>
