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
    <p style="color : red">{{$message}}</p>
    @enderror
    Password:
    <input type="password" name="pass" placeholder="Password"></br>
    @error('pass')
     <p style="color : red">{{$message}}</p> <br>
    @enderror
    <input type="submit" value="Login">
</form>
<h5>{{Session::get('msg')}}</h5>
@endsection