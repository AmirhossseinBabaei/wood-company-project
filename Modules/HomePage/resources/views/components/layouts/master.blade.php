<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'وبلاگ شخصی' }}</title>

    <meta name="description" content="{{ $description ?? 'وبلاگ شخصی من' }}">
    <meta name="keywords" content="{{ $keywords ?? 'Blog, Laravel, Personal' }}">
    <meta name="author" content="{{ $author ?? 'Your Name' }}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Vite --}}
    {{-- @vite(['resources/css/app.css','resources/js/app.js']) --}}

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Vazirmatn',sans-serif;
            background:#f5f7fb;
            color:#222;
            line-height:1.9;
        }

        a{
            text-decoration:none;
            color:inherit;
        }

        img{
            max-width:100%;
        }

        .container{
            width:90%;
            max-width:1200px;
            margin:auto;
        }

        /* Header */

        header{
            background:#fff;
            box-shadow:0 5px 20px rgba(0,0,0,.05);
            position:sticky;
            top:0;
            z-index:100;
        }

        .navbar{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:18px 0;
        }

        .logo{
            font-size:26px;
            font-weight:700;
            color:#2563eb;
        }

        nav{
            display:flex;
            gap:30px;
        }

        nav a{
            transition:.3s;
            font-weight:500;
        }

        nav a:hover{
            color:#2563eb;
        }

        /* Hero */

        .hero{
            padding:90px 0;
            text-align:center;
        }

        .hero h1{
            font-size:52px;
            margin-bottom:20px;
        }

        .hero p{
            color:#666;
            max-width:650px;
            margin:auto;
            font-size:18px;
        }

        .btn{
            display:inline-block;
            margin-top:35px;
            background:#2563eb;
            color:#fff;
            padding:14px 28px;
            border-radius:10px;
            transition:.3s;
        }

        .btn:hover{
            background:#1d4ed8;
        }

        /* Main */

        main{
            padding:70px 0;
            min-height:60vh;
        }

        /* Footer */

        footer{
            background:#111827;
            color:#ddd;
            padding:120px 0;
            text-align:center;
            margin-top:68px;
        }

        footer p{
            opacity:.8;
        }

        /* Dark Mode */

        @media (prefers-color-scheme: dark){

            body{
                background:#0f172a;
                color:#eee;
            }

            header{
                background:#111827;
            }

            nav a{
                color:#eee;
            }

            .hero p{
                color:#b8c0cc;
            }

            footer{
                background:#020617;
            }
        }

        @media(max-width:768px){

            .navbar{
                flex-direction:column;
                gap:15px;
            }

            nav{
                gap:18px;
                flex-wrap:wrap;
                justify-content:center;
            }

            .hero h1{
                font-size:34px;
            }
        }
    </style>

</head>

<body>

<header>

    <div class="container navbar">

        <a href="/" class="logo">
            MyBlog
        </a>

        <nav>
            <a href="/">خانه</a>
            <a href="/posts">مقالات</a>
            <a href="/about">درباره من</a>
            <a href="/contact">تماس</a>
        </nav>

    </div>

</header>

<main class="container">

    {{ $slot }}

</main>

<footer>

    <div class="container">

        <p>
            © {{ date('Y') }}
            تمامی حقوق محفوظ است.
        </p>

    </div>

</footer>

{{-- Vite JS --}}
{{-- @vite(['resources/js/app.js']) --}}

</body>
</html>
