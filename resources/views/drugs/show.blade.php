@extends('layouts.drugs')
@section('content')
<div class="table-wrapper">
<table class="fl-table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Formula</th>
        <th>Price</th>
        <th>Available</th>
        <th>Action</th>
    </tr>
    
    @foreach($drugs as $d)
    <tr>
        <td>{{$d->id}}</td>
        <td>{{$d->name}}</td>
        <td>{{$d->formula}}</td>
        <td>{{$d->price}}</td>
        <td>{{$d->available}}</td>
        <td><a href="{{route('drugs.add',['id'=>$d->id])}}" class='butt-update'>Add</a>
        <a href="{{route('drugs.delete',['id'=>$d->id])}}" class='butt'>Delete</a></td>
    </tr>
    @endforeach
    
</table>
<h5 style="color : green">{{Session::get('drugsAdd')}}</h5>
{{$drugs->links()}}

<style>
    .w-5{
        display:none;
    }
</style>
</div>
@endsection