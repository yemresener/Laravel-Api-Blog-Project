<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/Login.css')}}">
</head>

<!-- NAVBAR -->
@include('Navbar.Navbar')
<!-- NAVBAR -->

<div class="wrapper" id="wrapper-login">
    <form id="login-form" method="POST">
        @csrf
        <div class="login-container">
            <h2>Login</h2>
            <div class="input-group">
                <label for="login-username">Username</label>
                <input type="text" name="name" id="login-username" placeholder="Enter your username">
            </div>
            <div class="input-group">
                <label for="login-password">Password</label>
                <input type="password" name="password" id="login-password" placeholder="Enter your password">
            </div>
            <button type="button" class="show-login-password-btn" id="show-login-password-btn"><i class="fa-regular fa-eye"></i></button>
            <button class="login-btn" type="submit">Login</button>
            <p>Don't have an account? <button class="register-btn" type="button" onclick="showRegister()">Register</button></p>
            <div id="login-response-message" style="margin-top: 10px;"></div>
        </div>
    </form>
</div>

<div class="wrapper-register" id="wrapper-register">
    <form id="register-form" method="POST">
        @csrf
        <div class="login-container">
            <h2>Register</h2>
            <div class="input-group">
                <label for="register-email">Email</label>
                <input  name="email" id="register-email" placeholder="Enter your email address">
            </div>
            <div class="input-group">
                <label for="register-username">Username</label>
                <input type="text" name="username" id="register-username" placeholder="Enter your username">
            </div>
            <div class="input-group">
                <label for="register-password">Password</label>
                <input type="password" name="password" id="register-password" placeholder="Enter your password">
            </div>
            <button type="button" class="show-register-password-btn" id="show-register-password-btn"><i class="fa-regular fa-eye"></i></button>
            <button class="create-btn" type="submit">Create</button>
            <button type="button" class="route-login-btn" onclick="showLogin()">Login</button>
            <div id="register-response-message" style="margin-top: 10px;"></div>
        </div>
    </form>
</div>

<!-- FOOTER -->
@include('Footer.Footer')
<!-- FOOTER -->
   
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/LoginPage.js') }}"></script>
<script src="{{ asset('js/API-LoginPage.js') }}"></script>
