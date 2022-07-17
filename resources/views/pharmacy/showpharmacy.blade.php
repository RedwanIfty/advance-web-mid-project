@extends('layouts.pharmacy')
@section('content')
<div class="table-wrapper">
<table class="fl-table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone no</th>
        <th>Action</th>
    </tr>
    @if(Session::has('searchPharmacy'))
    @foreach($pharmacy as $p)
    <tr>
        <td>{{$p->id}}</td>
        <td>{{$p->name}}</td>
        <td>{{$p->address}}</td>
        <td>{{$p->phone_no}}</td>
        <td><a href="{{route('update.pharmacy',['id'=>$p->id])}}" class='butt'>Delete</a>
        <a href="{{route('update.pharmacy',['id'=>$p->id])}}" class='butt-update'>Update</a></td>
    </tr>
    @endforeach
    @else
    @foreach($pharmacy as $p)
    <tr>
        <td>{{$p->id}}</td>
        <td>{{$p->name}}</td>
        <td>{{$p->address}}</td>
        <td>{{$p->phone_no}}</td>
        <td><a href="{{route('update.pharmacy',['id'=>$p->id])}}" class='butt'>Delete</a>
        <a href="{{route('update.pharmacy',['id'=>$p->id])}}" class='butt-update'>Update</a></td>
    </tr>
    @endforeach
    @endif
</table>
<h5>{{Session::get('msgPharmacy')}}</h5>
<h5>{{Session::get('deletemsg')}}</h5>
<h5>{{Session::get('pharmacyUpdate')}}</h5>

@if(!Session::has('searchPharmacy'))
{{$pharmacy->links()}}
<style>
    .w-5{
        display:none;
    }
</style>
@endif
</div>
@endsection