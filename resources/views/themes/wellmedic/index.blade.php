<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('themes/'.$theme.'/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('themes/'.$theme.'/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('themes/'.$theme.'/images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('themes/'.$theme.'/images/favicon/site.webmanifest') }}">
    <link rel="stylesheet" href="{{ url('themes/wellmedic/css/index.css') }}">
    @yield('seo_social_stuff')
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,500&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700&amp;subset=latin-ext" rel="stylesheet">
</head>
<body>
  @include('themes.'.$theme.'.partials.icons')
  @include('themes.'.$theme.'.partials.mobile-nav')
  @include('themes.'.$theme.'.partials.header')

  <div class="content">
    @yield('content')
  </div>

  @include('themes.'.$theme.'.partials.footer')

<script>
  window.app_url = "{{ url('/') }}";
</script>

<script src="{{ url('themes/wellmedic/js/index.js') }}"></script>
@yield('footer_scripts')
</body>
</html>