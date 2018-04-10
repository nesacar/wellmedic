<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wellmedic - @yield('title')</title>
    <link rel="stylesheet" href="{{ url('themes/wellmedic/css/index.css') }}">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,500&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700&amp;subset=latin-ext" rel="stylesheet">
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
</body>
</html>