@extends('layouts.dash')
@section('content')
<form method="post" action="">
        {{@csrf_field()}}
        Name: <input type="text" name="search" placeholder="Search" value="{{old('search')}}"><br>
        @error('search')
            {{$message}}<br>
        @enderror
        
        <input type="submit" value="search">
</form>
@if(Session::has('searchRes'))
<div class="table-wrapper">
<table  class="fl-table">
<tr>
    <th>Name:</th>
    <th>Email:</th>
    <th>Type:</th>
</tr>
@foreach($user as $u)
<tr>
    <td>{{$u->name}}</td>
    <td>{{$u->email}}</td>
    <td>{{$u->type}}</td>
</tr>
@endforeach
</table>
</div>
@endif
@endsection