<link rel="stylesheet" type="text/css" href="/css/nav.css">
<link rel="stylesheet" type="text/css" href="/css/dash.css">
<header>
        <nav class="navbar">
            <ul>
                <li><a href="{{route('admin.dash.show')}}">Home</a></li>
                <li><a href="{{route('login')}}">Login</a></li>
                <li><a href="{{route('register')}}">Registration</a></li>
                <li><a href="#">Contact us</a></li>
            </ul>
        </nav>
    </header>
    @include('layouts.footer')