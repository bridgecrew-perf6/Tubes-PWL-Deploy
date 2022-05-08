<!DOCTYPE html>
<html>
  <head>
    <title>
        @yield('title')
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" href="scss/signin.scss">
    <script src="{{ URL::asset('js/jquery-3.6.0.min.js') }}"></script>
</head>
<body>
  
 @yield('content')
</body>
</html>
@yield('script')
