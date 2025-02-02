<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'], // API ve Sanctum yolları izinli
    'allowed_methods' => ['*'],                 // Tüm HTTP yöntemlerine izin ver
    'allowed_origins' => ['http://127.0.0.1:8000', 'http://localhost:8000', '*'], // '*' kullanımı tüm domainleri açar
    'allowed_origins_patterns' => [],           // Gerekirse belirli bir pattern ekleyebilirsiniz
    'allowed_headers' => ['*'], // İzinli header'lar
    'exposed_headers' => ['Authorization'],     // `Authorization` başlığını client'e expose et
    'max_age' => 0,                             // Tarayıcıda cache süresi
    'supports_credentials' => true,
    

];
