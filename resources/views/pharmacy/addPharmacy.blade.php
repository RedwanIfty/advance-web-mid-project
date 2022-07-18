@extends('layouts.pharmacy')
@section('content')

<form action="" method="post">
    {{@csrf_field()}}
    Name:
    <input type="text" name="name" placeholder="Enter pharmacy name" value="{{old('name')}}"><br>
    @error('name')
    <p style="color : red">{{$message}}</p>
    @enderror
    Address:
    <input type="text" name="address" placeholder="Address" value="{{old('address')}}"></br>
    @error('address')
     <p style="color : red">{{$message}}</p> <br>
    @enderror
    Phone NO:
    <input type="text" name="phone_no" placeholder="Phone number" value="{{old('phone_no')}}"></br>
    @error('phone_no')
     <p style="color : red">{{$message}}</p> <br>
    @enderror
    
    <input type="submit" value="Submit">
</form>
@endsection