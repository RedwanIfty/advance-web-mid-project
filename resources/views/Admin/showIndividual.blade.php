
<link rel="stylesheet" type="text/css" href="/css/image.css">
@extends('layouts.dash')
@section('content')

@foreach($user as $u)
        <div>
                <div><img src="{{asset('/storage/uploads/'.$u->pro_pic.'')}}" alt="" width=250px height=200px></div>
                <div class="profile">Id:{{$u->id;}}</div><br>
                <div class="profile">Name:{{$u->name;}}</div><br>
                <div class="profile">Email:{{$u->email;}}</div><br>
                <div class="profile">Password:{{$u->password;}}</div><br>
                <div class="profile">Type:{{$u->type;}}</div> 

        </div>
@endforeach
@endsection