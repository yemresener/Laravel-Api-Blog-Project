<head>
    <link rel="stylesheet" href="{{ asset('css/Category.css') }}">

</head>
    <!-- NAVBAR -->
    @include('NavBar.NavBar')
    <!-- NAVBAR -->

    <div class="NewestPostsAndPopular">
        <h3 class="left">Posts</h3>    
    </div>
    <div id="NewestAndPopularContainer" class="NewestAndPopularContainer">

    </div>

    <script src="{{ asset('js/API-CategoryPage.js') }}"></script>

    <!-- Footer -->
    @include('Footer.Footer')
    <!-- Footer -->
