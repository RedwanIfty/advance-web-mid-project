<h1>Admin Dashboard</h1>
<h2>Welcome Mr/Ms {{$user->name}}</h2>
<a href="{{route('admin.dash.show')}}">Show All</a>
<a href="{{route('admin.dash.search')}}">Search</a>
<a href="{{route('logout')}}">Logout</a>
@include('layouts.footer')