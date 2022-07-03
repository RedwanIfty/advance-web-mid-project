<h1>User list</h1>
<table border='1'>
<tr>
    <th>id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Password</th>
    <th>Type</th>
    <th>Action</th>
</tr>
@foreach($users as $u)
    <tr>
        <td><a href="{{route('admin.dash.show.individual',['id'=>$u->id])}}">{{$u->id;}}</a></td>
        <td>{{$u->name;}}</td>
        <td>{{$u->email;}}</td>
        <td>{{$u->password;}}</td>
        <td>{{$u->type;}}</td>
        <td><a href="{{route('admin.dash.delete',['id'=>$u->id])}}">Delete</a></td>
        </tr>
@endforeach
</table>
{{$users->links()}}

<style>
    .w-5{
        display:none;
    }
</style>
@include('includes.logout')