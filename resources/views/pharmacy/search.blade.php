@extends('layouts.pharmacy')
@section('content')

<form action="" method="post">
    {{@csrf_field()}}
    Search:
    <input type="text" name="search" placeholder="Search by Pharmacy name"></br>
    @error('search')
     <p style="color : red">{{$message}}</p> <br>
    @enderror
    
    <input type="submit" value="Search">
</form>
@endsection