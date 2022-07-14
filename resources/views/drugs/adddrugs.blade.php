@extends('layouts.drugs')
@section('content')

<form action="" method="post">
    {{@csrf_field()}}
    Name:{{Session::get('name')}}<br><br>
    Available:{{Session::get('available')}}<br><br>
    Add:
    <input type="number" name="available" placeholder="Add drugs quantity"></br>
    @error('available')
     <p style="color : red">{{$message}}</p> <br>
    @enderror
    
    <input type="submit" value="Submit">
</form>
@endsection