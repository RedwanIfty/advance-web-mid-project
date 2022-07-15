
<link rel="stylesheet" type="text/css" href="/css/image.css">
@extends('layouts.dash')
@section('content')
<div class="table-wrapper">
    <a href="{{route('admin.dash.download')}}" class='butt-update' style="float:right;">Download PDF</a>
    <table  class="fl-table">
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Type</th>
        <th>Profile Picture</th>
        <th>Action</th>
    </tr>
    @php
    $sum=0;
    @endphp
    @foreach($users as $u)
        <tr>
            <td><a href="{{route('admin.dash.show.individual',['id'=>$u->id])}}">{{$u->id;}}</a></td>
            <td>{{$u->name;}} </td>
            <td>{{$u->email;}}</td>
            <td>{{$u->password;}}</td>
            <td>{{$u->type;}}</td>
            <td><img src="{{asset('/storage/uploads/'.$u->pro_pic.'')}}" alt="" width=50px height=40px></td>
            @if($u->type!='Admin')
            <td><a href="{{route('admin.dash.delete',['id'=>$u->id])}}" class='butt'>Delete</a>
            <a href="{{route('admin.dash.update',['id'=>$u->id])}}" class='butt-update'>Update</a></td>
            @endif
            </tr>
    @endforeach
    </table>
</div>
{{$users->links()}}

<style>
    .w-5{
        display:none;
    }
</style>
<h4 style="color:green;">{{Session::get('updateMsg')}}<h4>
@endsection
