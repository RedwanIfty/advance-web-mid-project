<h1>User list</h1>
<link rel="stylesheet" type="text/css" href="/css/image.css">
@extends('layouts.dash')
@section('content')
@include('includes.logout')
<div class="table-wrapper">
    <table  class="fl-table">
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Type</th>
        <!-- <th>Profile Picture</th> -->
    </tr>
    @foreach($users as $u)
        <tr>
            <td>{{$u->id;}}</a></td>
            <td>{{$u->name;}} </td>
            <td>{{$u->email;}}</td>
            <td>{{$u->password;}}</td>
            <td>{{$u->type;}}</td>
            <!-- <td><img src="{{public_path('/storage/uploads/'.$u->pro_pic.'')}}" alt="" width=50px height=40px></td> -->
        </tr>
    @endforeach
    </table>
@endsection
