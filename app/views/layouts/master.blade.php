<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-1.11.3.min.js"></script>

</head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>