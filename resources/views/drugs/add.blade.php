@extends('layouts.drugs')
@section('content')

<form action="" method="post">
    {{@csrf_field()}}
    Name:
    <input type="text" name="name" placeholder="Enter drugs name"><br>
    @error('name')
    <p style="color : red">{{$message}}</p>
    @enderror
    Formula:
    <input type="text" name="formula" placeholder="Formula"></br>
    @error('formula')
     <p style="color : red">{{$message}}</p> <br>
    @enderror
    Price:
    <input type="number" name="price" placeholder="Price"></br>
    @error('price')
     <p style="color : red">{{$message}}</p> <br>
    @enderror
    Available:
    <input type="number" name="available" placeholder="Available"></br>
    @error('available')
     <p style="color : red">{{$message}}</p> <br>
    @enderror
    
    <input type="submit" value="Submit">
</form>
<h5 style="color : green">{{Session::get('drugsmsg')}}</h5>

@endsection