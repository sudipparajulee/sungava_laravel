<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Laravel Project</title>
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
</head>
<body>
    <ul class="menu">
        <li><a href="">Home</a></li>
        <li><a href="">About</a></li>
        <li><a href="">Contact</a></li>
        <li><a href="">Login</a></li>
    </ul>
    @yield('content')

    @yield('content2')
    <h1>My footer section</h1>
</body>
</html>