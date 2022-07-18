@extends('layouts.dash')
@section('content')
<form method="post" action="" enctype="multipart/form-data">
        {{@csrf_field()}}
        Image Upload:
        <input type="file" name="p_image">
        @error('p_image')
            <p class="error">{{$message}}</p>
        @enderror
        <br>
        <input type="submit" value="Change">
</form>
@endsection