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
                <div class="profile">Id:{{$u->id;}}</div><br>
                <div class="profile">Name:{{$u->name;}}</div><br>
                <div class="profile">Email:{{$u->email;}}</div><br>
                <div class="profile">Password:{{$u->password;}}</div><br>
                <div class="profile">Type:{{$u->type;}}</div>n  

        </div>
@endforeach
</body>
</html>