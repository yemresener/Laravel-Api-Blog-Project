
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/MyPosts.css') }}">
</head>
<body>
    @include('NavBar.NavBar')

    <div class="unconfirmedPosts">
        <h3 class="unconfirmed"><i class="fa-solid fa-circle-exclamation"></i> Unconfirmed Posts</h3>
        <div id="UnconfirmPostsContainer"></div>
    </div>

    <div class="NewestPostsAndPopular">
        <h3 class="left">My Posts</h3>        
    </div>
    <div id="NewestAndPopularContainer" class="NewestAndPopularContainer">

    </div>
    <div id="newestPostsContainer"></div>
    <div class="paginator" id="paginationContainer" ></div>
    <!-- Footer -->
    @include('Footer.Footer')
    <!-- Footer -->



    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/API-UserPostPage.js') }}"></script>
</body>
</html>