<!DOCTYPE html>
<html> 
<head>
    <title>Home</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body class="bg-light">
    @include('partials.site-header')
    @yield('content')
    @include('partials.site-footer')
</body>
</html>