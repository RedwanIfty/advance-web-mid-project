@extends('layouts.dash')
@section('content')
<h2 style ="color:black">Welcome, {{$user->name}}</h2>

@include('layouts.footer')
@endsection