<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wellmedic - @yield('title')</title>
    <style>
       {{ include('themes/wellmedic/css/critical.css') }}
    </style>
</head>
<body>
  @include('themes/wellmedic/partials/icons')
  @include('themes/wellmedic/partials/mobile-nav')
  @include('themes/wellmedic/partials/header')

  <div class="content">

    @yield('content')

  </div>

  @include('themes/wellmedic/partials/footer')

<script>
  window.app_url = "{{ url('/') }}";
</script>

<script src="{{ url('themes/wellmedic/js/index.js') }}"></script>
<noscript>
  <link rel="stylesheet" href="{{ url('themes/wellmedic/css/index.css') }}">
</noscript>
</body>
</html>