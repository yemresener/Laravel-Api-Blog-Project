<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/CreatePost.css') }}">
    <title>Document</title>
</head>
<body>
        <!-- NAVBAR -->
        @include('NavBar.NavBar')
        <!-- NAVBAR -->
        <br><br><br><br><br><br><br><br><br><br>

    <form class="form" action="" method="POST" enctype="multipart/form-data" id="createPost">
        @csrf
        
        <label for="">Category</label>  
        <select name="category_id" class="category_id" id="">
            @foreach ($categories as $item)
                
            <option value="{{$item->id}}">{{$item->category_name}}</option>
            
            @endforeach
        </select>

        <!-- Main Image -->
        <p>
            <label for="home_image">Main Image</label><p></p>
            <input class="inputs" type="file" name="home_image" id="home_image" accept="image/*">
            <div class="home_image" id="imagePreviewContainer" style="display: none;">
                <h3>Yüklenen Resim:</h3>
                <img id="imagePreview" src="#" alt="Resim Önizlemesi" style="max-width: 300px; max-height: 200px;">
            </div>
            
        </p><br>

        <!-- Main Title -->
        <p>
            <label for="main_title">Main Title</label><br>
            <input class="inputs" class="Title" type="text" name="main_title" id="main_title" required>
        </p><br>

        <!-- Main Article -->
        <p>
            <label for="main_article">Main Article</label><br>
            <textarea name="main_article" rows="5" id="main_article" cols="50" required ></textarea>
        </p><br>

        
        <p>
            <!-- 1. Alt Başlık ve Açıklama -->
            <div class="MoreDiv" id="additional_content1" style="display: none;">
                <label for="low_title1">1. Low Title</label><p></p>
                <input class="inputs" class="Title" type="text" name="low_title1" id="low_title1" placeholder="Nullable"><br><br>
                <label for="low_article1">1. Low Article</label><p></p>
                <textarea name="low_article1" rows="5" cols="50" placeholder="Nullable" id="low_article1"></textarea><br><br>
                
            </div>
            <button class="MoreBtn" id="toggle_button1" type="button" onclick="toggleContent('additional_content1', 'toggle_button2', 'show'); showNextButton('toggle_button1', 'toggle_button2');">Daha Fazla</button>
        </p>
        
        <p>
            <!-- 2. Alt Başlık ve Açıklama -->
            <div class="MoreDiv" id="additional_content2" style="display: none;">
                <label for="low_title2">2. Low Title</label><p></p>
                <input class="inputs" class="Title" type="text" name="low_title2" id="low_title2" placeholder="Nullable"><br><br>
                <label for="low_article2">2. Low Article</label><p></p>
                <textarea name="low_article2" rows="5" cols="50" placeholder="Nullable"></textarea><br><br>
                
            </div>
            <button class="MoreBtn" id="toggle_button2" type="button" style="display: none;" onclick="toggleContent('additional_content2', 'toggle_button3', 'show'); showNextButton('toggle_button2', 'toggle_button3');">Daha Fazla</button>
        </p>
        
       

        <button class="MoreBtn" type="submit">Postayı Gönder</button>
    </form>
    <p id="message" style="color: green;"></p>
    <script src="{{ asset('js/API-CreatePost.js') }}"></script>
    <script src="{{ asset('js/CreatePost.js') }}"></script>
</body>
</html>