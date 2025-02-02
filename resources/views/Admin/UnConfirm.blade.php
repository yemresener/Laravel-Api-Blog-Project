<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/Category.css') }}">

</head>
@include('NavBar.NavBar')
<div class="NewestPostsAndPopular">
    <h3 class="left">Onay Bekleyen Postlar</h3>        
</div>
<div id="NewestAndPopularContainer" class="NewestAndPopularContainer">

   
</div>

<div id="newestPostsContainer"></div>
<div class="paginator" id="paginationContainer" ></div>


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/API-UnConfirmPage.js') }}"></script>
