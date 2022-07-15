@extends('layouts.drugs')
@section('content')

<form action="" method="post">
    {{@csrf_field()}}
    <input type="text" name="search" placeholder="Search by Drugs name"></br>
    @error('search')
     <p style="color : red">{{$message}}</p> <br>
    @enderror
    
    <input type="submit" value="Search">
</form>
@endsection