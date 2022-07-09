<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/css/home.css">
</head>
<body>
<h1>User Details</h1>

@foreach($user as $u)
        <div>
                <div><img src="{{asset('/storage/uploads/'.$u->pro_pic.'')}}" alt="" width=150px height=140px></div>
                <div>Id:{{$u->id;}}</div>
                <div>Name:{{$u->name;}}</div>
                <div>Email:{{$u->email;}}</div>
                <div>Password:{{$u->password;}}</div>
                <div>Type:{{$u->type;}}</div>

        </div>
@endforeach
</body>
</html>