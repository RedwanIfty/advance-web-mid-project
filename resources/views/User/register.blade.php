<link rel="stylesheet" href="/css/image.css">
@extends('layouts.main')

@section('content')
    <form method="post" action="" enctype="multipart/form-data">
        {{@csrf_field()}}
        Name: <input type="text" name="name" placeholder="Name" value="{{old('name')}}"><br>
        @error('name')
            {{$message}}<br>
        @enderror
        Email: <input type="text" name="email" placeholder="Email"><br>
        @error('email')
            {{$message}} <br>
        @enderror
        Type: <input type="radio" value="Patient" name="type"> Patient
              <input type="radio" value="Doctor" name="type"> Doctor
              <input type="radio" value="Employee" name="type">Employee<br>
        @error('type')
            {{$message}}<br>
        @enderror
        Image Upload:<input type="file" name="p_image">
		
         @error('p_image')
            {{$message}}
        @enderror
        <br>
        Password: <input type="password" name="password" ><br>
        @error('password')
            {{$message}}<br>
        @enderror
        Confirm Password: <input type="password" name="conf_password"><br>
        @error('conf_password')
            {{$message}}<br>
        @enderror
        <input type="submit" value="Register">
    </form>
@endsection
<h4>{{Session::get('msg')}}</h4>