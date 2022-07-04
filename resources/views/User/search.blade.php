<h1>Search</h1>
<form method="post" action="">
        {{@csrf_field()}}
        Name: <input type="text" name="search" placeholder="Search" value="{{old('search')}}"><br>
        @error('search')
            {{$message}}<br>
        @enderror
        
        <input type="submit" value="search">
    </form>