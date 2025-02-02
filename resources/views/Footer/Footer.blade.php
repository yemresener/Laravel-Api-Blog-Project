<link rel="stylesheet" href="{{ asset('css/Footer.css') }}">
    <!-- FONT AWESOME CDN-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<footer>
    <div class="FooterContainer">
        <div class="Icons">
            <a href="https://github.com/yemresener"><i class="fa-brands fa-github"></i></a>
            <a href="https://linkedin.com/in/yemresener"><i class="fa-brands fa-linkedin"></i></a>
            <a href="https://instagram.com/yunusener"><i class="fa-brands fa-instagram"></i></a> 
        </div>
        <div class="FooterNav">
            <ul>
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="{{route('AboutPage')}}">About Us</a></li>
                <li><a href="">Login/Register</a></li>
            </ul>
        </div>
    </div>
        
    <div class="FooterBottom">
        <p> &copy;2025 Designed by  <span class="designer">Yunus</span> </p>
    </div>
</footer>