
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') | OKua</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
</head>
<body style="background-color: #1a3165">

    @yield('body')

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>

</body>
</html>
