<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home</title>
</head>
<body>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    @include('navbar')

    <div class="img"><img src="{{ asset('logo/resturant.jpg') }}" alt="Home" width="100%" height="500" ></div>
    <div class="content">
        <h1>Hello!</h1>
        <p>
            Welcome to <span class="yumyum">Yum Yum</span> – where every bite is a journey! ❤️<br>
            <span class="description">Discover homemade magic, authentic flavors, and a table set just for you.</span>
        </p>
        <a href="{{ route('menu') }}" class="btn">Our menu</a>
    </div>
    
    
    
</body>
</html>
