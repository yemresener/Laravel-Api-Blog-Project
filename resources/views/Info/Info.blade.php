<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/Info.css') }}">
</head>
<body>
    @include('NavBar.NavBar')


    <div class="dashboard-wrapper">
        <div class="dashboard-container">
            <h1>User Name: {{ auth()->user()->name }}</h1>
            <div class="dashboard-section">
                <h2>E-mail address: {{ auth()->user()->email }}</h2>
            </div>
            <div class="dashboard-section">
                <h2>Change Password:</h2>
            </div>
            <form action="{{ route('change_password') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="inputs">
                    <label for="current_password">Current Password</label>
                    <input type="text" name="current_password" id="current_password">
                    @error('current_password')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
    
                    <label for="new_password1">New Password:</label>
                    <input type="text" name="new_password1" id="new_password1">
                    @error('new_password1')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
    
                    <label for="new_password2">Confirm New Password:</label>
                    <input type="text" name="new_password2" id="new_password2">
                    @error('new_password2')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
    
                    <button class="dashboard-logout-btn" type="submit">Change</button>
                </div>
    
                <!-- Genel bir hata mesajı -->
                @if(session('error'))
                <p class="error-message">{{ session('error') }}</p>
                @endif
    
                @if(session('success'))
                <p class="success-message">{{ session('success') }}</p>
                @endif
            </form>
        </div>
    </div>


</body>
</html>