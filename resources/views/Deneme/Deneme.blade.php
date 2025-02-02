<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
</head>
<body>
    <input type="text" name="" id="">
    <input type="text" name="" id="">
    <input type="text" name="" id="">
    <label for="">MERHABALAR</label>
    <h1>SAFKJJHGFKASDGNDSHG DSJGJKSDHGJSDHGJHSDJGHJSDHGJSDJHGJSHDGHJDSHJSGDHJGDSHJGSDJHKGDHJKS</h1>
</body>
</html>


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // CSRF token'ını axios'a ekle
        axios.defaults.withCredentials = true; // Çerezleri gönder
        axios.defaults.headers.common["X-CSRF-TOKEN"] = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

        // LocalStorage'dan token'ı al
        const token = localStorage.getItem("auth_token");
        if (token) {
            axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
        } else {
            console.error("Token bulunamadı!");
        }
        axios.defaults.baseURL = "127.0.0.1";
        // Web rotasına API isteği yap
        axios.get("http://127.0.0.1:8000/web-protected-route")
            .then((response) => {
                console.log("Başarılı:", response.data);
            })
            .catch((error) => {
                console.error("Hata:", error.response.data);
            });
    </script>