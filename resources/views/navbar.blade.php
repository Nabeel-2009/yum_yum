<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>My Website</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

    <nav>
        <div class="nav-left">
            <a href="{{ route('home') }}">
                <img src="{{ asset('logo/logo.png') }}" alt="Logo" width="60" height="60">
            </a>
        </div>
        <div class="nav-center">
            <a href="{{ route('home') }}" class="circle-btn">Home</a>
            <a href="{{ route('menu') }}" class="circle-btn">Menu</a>
            <a href="#" onclick="event.preventDefault(); checkAuthAndRedirect();" class="circle-btn">Booking</a>
        </div>
        <div class="nav-right">
            @auth
                @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.dashboard') }}" class="circle-btn">Dashboard</a>
                @endif
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                   class="circle-btn">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}" class="circle-btn">Login</a>
                <a href="{{ route('register') }}" class="circle-btn">Register</a>
            @endauth
        </div>
    </nav>
    
    <div id="authModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>You need to login or register</h2>
            <p>Please login or create an account to access the booking page.</p>
            <a href="{{ route('login') }}" class="modal-btn">Login</a>
            <a href="{{ route('register') }}" class="modal-btn">Register</a>
        </div>
    </div>
    
    <script>
        function checkAuthAndRedirect() {
            let isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
            if (isAuthenticated) {
                window.location.href = "{{ route('book-table') }}";
            } else {
                document.getElementById('authModal').style.display = "block";
            }
        }
    
        function closeModal() {
            document.getElementById('authModal').style.display = "none";
        }
    </script>
    
</body>
</html>
