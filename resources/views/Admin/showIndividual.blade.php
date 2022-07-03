<h1>User Details</h1>
<table border='1'>
<tr>
    <th>id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Password</th>
    <th>Type</th>
</tr>
@foreach($user as $u)
    <tr>
        <td>{{$u->id;}}</td>
        <td>{{$u->name;}}</td>
        <td>{{$u->email;}}</td>
        <td>{{$u->password;}}</td>
        <td>{{$u->type;}}</td>
    </tr>
@endforeach
</table>