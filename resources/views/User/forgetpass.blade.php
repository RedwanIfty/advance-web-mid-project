@extends('layouts.main')
@section('content')
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
    Confirm Password:
    <input type="password" name="conf_password" placeholder="Confirm Password"></br>
    @error('conf_password')
     <p style="color : red">{{$message}}</p> <br>
    @enderror
    <input type="submit" value="Submit">
</form>
<h5>{{Session::get('forgetMsg')}}</h5>
@endsection