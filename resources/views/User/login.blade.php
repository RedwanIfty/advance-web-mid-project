@extends('layouts.main')
@section('content')
@if(Session::has('logged'))
<h3>Already Logged in </h3>
@endif
<form action="" method="post">
    {{@csrf_field()}}
    Email:
    <input type="text" name="email" placeholder="Email"><br>
    @error('email')
     {{$message}} <br>
    @enderror
    Password:
    <input type="password" name="pass" placeholder="Password"></br>
    @error('pass')
     {{$message}} <br>
    @enderror
    <input type="submit" value="Login">
</form>
<h5>{{Session::get('msg')}}</h5>
@endsection