@extends('layouts.drugs')
@section('content')
<div class="table-wrapper">
<a href="{{route('drugs.download')}}" class='butt-update' style="float:right;">Download PDF</a>
<table class="fl-table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Formula</th>
        <th>Price</th>
        <th>Available</th>
        <th>Total price</th>
        <th>Action</th>
    </tr>
    @if(Session::has('searchDrugs'))
    @foreach($drugs as $d)
    <tr>
        <td>{{$d->id}}</td>
        <td>{{$d->name}}</td>
        <td>{{$d->formula}}</td>
        <td>{{$d->price}}</td>
        <td>{{$d->available}}</td>
        <td>{{$d->price*$d->available}}</td>
        <td><a href="{{route('drugs.add',['id'=>$d->id])}}" class='butt-update'>Add</a>
        <a href="{{route('drugs.delete',['id'=>$d->id])}}" class='butt'>Delete</a></td>
    </tr>
    @endforeach
    @else
    @foreach($drugs as $d)
    <tr>
        <td>{{$d->id}}</td>
        <td>{{$d->name}}</td>
        <td>{{$d->formula}}</td>
        <td>{{$d->price}}</td>
        <td>{{$d->available}}</td>
        <td>{{$d->price*$d->available}}</td>
        <td><a href="{{route('drugs.add',['id'=>$d->id])}}" class='butt-update'>Add</a>
        <a href="{{route('drugs.delete',['id'=>$d->id])}}" class='butt'>Delete</a></td>
    </tr>
    @endforeach
    @endif
</table>
<h5 style="color : green">{{Session::get('drugsAdd')}}</h5>
@if(!Session::has('searchDrugs'))
{{$drugs->links()}}
@endif
<style>
    .w-5{
        display:none;
    }
</style>
</div>
@endsection