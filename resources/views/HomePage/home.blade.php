<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/HomePage.css') }}">
    <title>Home</title>
</head>
<body>


        <!-- NAVBAR -->
        @include('NavBar.NavBar')
        <!-- NAVBAR -->


        <div class="NewestPostsAndPopular">
            <h3 class="left">Newest Posts</h3>    
            <h3 class="right">Popular Posts</h3>   
        </div>
        
        <div class="NewestAndPopularContainer">
            <!-- Newest Posts -->
            
            <div class="NewestPostsContainer" id="newestPostsContainer"></div>
    
            <!-- Popular Posts -->
            <div class="PopularPostsContainer" id="popularPostsContainer"></div>
        </div>

    <!-- FOOTER -->

    @include('Footer.Footer')

    <!-- FOOTER -->
    <!-- Script Dosyasını Yükle -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="{{ asset('js/API-HomePage.js') }}"></script>



</body>
</html>
