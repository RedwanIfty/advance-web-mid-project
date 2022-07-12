<h1>Search</h1>
<form method="post" action="">
        {{@csrf_field()}}
        Name: <input type="text" name="search" placeholder="Search" value="{{old('search')}}"><br>
        @error('search')
            {{$message}}<br>
        @enderror
        
        <input type="submit" value="search">
</form>
@if(Session::has('searchRes'))
<table border='1'>
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
@endif