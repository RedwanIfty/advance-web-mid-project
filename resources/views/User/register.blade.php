<link rel="stylesheet" href="/css/image.css">
<link rel="stylesheet" href="/css/login.css">

@extends('layouts.dash')

@section('content')
    <form method="post" action="" enctype="multipart/form-data">
        {{@csrf_field()}}
        Name: <input type="text" name="name" placeholder="Name" value="{{old('name')}}"><br>
        @error('name')
        <p class="error">{{$message}}</p>
        @enderror
        Email: <input type="text" name="email" placeholder="Email"><br>
        @error('email')
        <p class="error">{{$message}}</p> 
        @enderror
        Type: <input type="radio" value="Patient" name="type"> Patient
              <input type="radio" value="Doctor" name="type"> Doctor
              <input type="radio" value="Employee" name="type">Employee<br>
        @error('type')
        <p class="error">{{$message}}</p>
        @enderror
        Image Upload:<input type="file" name="p_image"><br>
		
         @error('p_image')
            <p class="error">{{$message}}</p>
        @enderror
        Password: <input type="password" name="password" ><br>
        @error('password')
        <p class="error">{{$message}}</p>
        @enderror
        Confirm Password: <input type="password" name="conf_password"><br>
        @error('conf_password')
        <p class="error">{{$message}}</p>
        @enderror
        <input type="submit" value="Register">
    </form>
@endsection
<h4>{{Session::get('msg')}}</h4>