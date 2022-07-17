<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/dash.css">
        <link rel="stylesheet" type="text/css" href="/css/login.css">
        <link rel="stylesheet" type="text/css" href="/css/home.css">
        <link rel="stylesheet" type="text/css" href="/css/image.css">
    </head>
    <body>
        @include('includes.dashbar')
        <div>
            @yield('content')
        </div>
    </body>
</html>