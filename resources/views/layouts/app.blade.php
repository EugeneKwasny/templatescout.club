<!DOCTYPE html>
<html> 
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-61458036-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-61458036-3');
</script>
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body class="bg-light">
    @include('partials.site-header')
    @yield('content')
    @include('partials.site-footer')
</body>
</html>