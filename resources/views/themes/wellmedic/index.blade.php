<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
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