<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/Posts.css') }}">
    <title>Post Details</title>
</head>
<body>

    <!-- NAVBAR -->
    @include('NavBar.NavBar')
    <!-- NAVBAR -->

    <div class="NewestPosts">
        <div class="post" id="postDetail">
            <!-- Post bilgileri gelecek -->
            <div class="post secondary">
                <h2 class="secondary-title">MAIN YYYYYY gg TITLE2</h2>
                <p class="secondary-article">MAIN ARTICLE2</p>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    @include('Footer.Footer')
    <!-- FOOTER -->


    <script src="{{ asset('js/API-EachPostUser.js') }}"></script>
