<!DOCTYPE html>
<html lang="en"> 
<head>

  @if(App::environment('production'))
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-61458036-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-61458036-3');
    </script>
  @endif

  <title>@yield('title')</title>
  <meta name="description" content="@yield('description')">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @if($canonical)
    <link rel="canonical" href="{{$canonical}}" />
  @endif
  @yield('styles')
    

</head>
<body class="bg-light">
    @include('partials.site-header')
    @yield('content')
    @include('partials.site-footer')
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>