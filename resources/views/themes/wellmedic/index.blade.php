<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wellmedic - @yield('title')</title>
    <link rel="stylesheet" href="{{ url('themes/wellmedic/css/index.css') }}">
</head>
<body>
  @include('themes/wellmedic/partials/icons')

  <div class="content">
    @include('themes/wellmedic/partials/header')

    @yield('content')

  </div>

  @include('themes/wellmedic/partials/footer')
  
<script src="{{ url('themes/wellmedic/js/index.js') }}"></script>
</body>
</html>