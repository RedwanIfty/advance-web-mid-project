@extends('layouts.dash')
@section('content')
<div>
    <h2 style ="color:black">Welcome, {{$user->name}}</h2>
</div>
@include('layouts.footer')
@endsection