<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
</head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>


<!-- bootstrap link - consider cdn - 
<link href="{{ asset('components/bootstrap/dist/css/bootstrap.min.css')
   }}" rel="stylesheet"> -->