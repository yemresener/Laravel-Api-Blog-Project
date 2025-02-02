<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/Dashboard.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
</head>
<body>
    <!-- Navbar -->
    @include('NavBar.NavBar')
    <!-- Navbar -->

    <div class="dashboard-wrapper">
        <div class="dashboard-container">
            <h2>Welcome to your Dashboard</h2>
            <div class="dashboard-section">
                <a href="{{route('info')}}">Bilgilerim</a>
            </div>
            <div class="dashboard-section">
                <a href="{{route('myPosts')}}">Gönderilerim</a>
            </div>
            <form action="" method="POST" id="logout-form">
                @csrf
                <button type="submit" class="dashboard-logout-btn">Logout</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    @include('Footer.Footer')
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/API-Logout.js') }}"></script>

</body>
</html>
