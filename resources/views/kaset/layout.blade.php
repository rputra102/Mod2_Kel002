<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modul 2 Kelompok 02</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Manrope', sans-serif;
            color: #dddddd;
            background: #00000d;    
        }
    </style>
</head>

<body class="antialiased">
<nav class="navbar">
    <ul>
        <li><a>Rentry.id</a></li>
        <li><a href="{{ url('/') }}">Transaksi</a></li>
        <li><a href="{{ url('/kaset') }}">Kaset</a></li>
        <li><a href="{{ url('/staff') }}">Staff</a></li>
        <li><a href="{{ url('/bin') }}">Bin Kaset</a></li>
        <li><a href="{{ url('/bindua') }}">Bin Staff</a></li>
    </ul>
</nav>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>
<style>
    .navbar {
    background-color: #00000d;
    color: white;
    padding: 15px;
}

.navbar ul {
    list-style: none;
    padding: 0;
}

.navbar ul li {
    display: inline;
    margin-right: 10px;
}

.navbar ul li a {
    color: pink;
    text-decoration: none;
    padding: 5px;
}
</style> 
</html>