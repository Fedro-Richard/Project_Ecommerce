@extends('layouts.app', ['assets' => ['resources/css/home.css', 'resources/js/home.js']])

@section('title', 'Cookie Co. - Freshly Baked Artisanal Cookies')

@section('content')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Support - Delicious Cookies</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fff0e6 0%, #ffe4cc 100%); /* Background Pink/Oren Muda */
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center; /* Posisi Tengah Horizontal */
            align-items: center;     /* Posisi Tengah Vertikal */
            flex-direction: column;
        }

        .welcome-container {
            text-align: center;
            margin-bottom: 50px;
            color: #8B4513; /* Warna Coklat Tua */
            animation: fadeIn 1s ease-in;
        }

        h1 { font-size: 2.5rem; margin-bottom: 10px; }
        p { font-size: 1.1rem; color: #a0522d; }
        .emoji { font-size: 4rem; display: block; margin-bottom: 10px; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>


    @include('bot')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Kita kasih delay sedikit biar animasinya enak dilihat
            setTimeout(() => {
                const chatBox = document.getElementById('chat-box');
                const chatBtn = document.getElementById('chat-floating-btn');
                
                // Paksa Buka
                if(chatBox.style.display === 'none' || chatBox.style.display === '') {
                    chatBox.style.display = 'flex';
                    chatBtn.style.display = 'none';
                }
            }, 500); // Terbuka setelah 0.5 detik
        });
    </script>

</body>
</html>