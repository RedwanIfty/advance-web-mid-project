<h1>Search Result</h1>
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