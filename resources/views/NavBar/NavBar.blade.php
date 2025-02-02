<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/NavBar.css') }}">
    <title>Home</title>
</head>
<body>
    <div class="NavBar">
        <ul class="NavBarColumn"><a href="{{route('home')}}">Home</a></ul>
        <ul class="NavBarColumn">
            <div class="dropdown">
            <button class="dropdown-btn">Categories</button>
            <div class="dropdown-content">
                @foreach ($categories as $item)
                <a href="{{route('category',$item->id)}}">{{$item->category_name}}</a>
                @endforeach 

            </div>
        </div>
    </ul>    
        <ul class="NavBarColumn"><a href="{{route('AboutPage')}}">About Us</a></ul>
          
        @auth  
        <ul class="NavBarColumn"><a href="{{route('developer')}}">Developer</a></ul>    
        <ul class="NavBarColumn"><a href="{{route('create')}}">Create</a></ul>
        <ul class="NavBarColumn"><a href="{{route('dashboard')}}">Dashboard</a></ul>        
        @endauth
        @guest       
        <ul class="NavBarColumn"><a href="{{route('login')}}">Login/Register</a></ul>  
        @endguest



    </div>
</body>
</html>