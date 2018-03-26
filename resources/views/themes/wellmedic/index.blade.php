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

    <div class="container">
      <h1 class="headline">Headline</h1>
      <h2 class="title"><span class="thin">Prefix</span> Title</h2>
      <p class="caption">Caption</p>
      <h3 class="subheading">Subheading</h3>
      <p>This is a block of text.</p>

      <button class="btn">Button</button>
      <button class="btn btn-primary">Primary Button</button>
      <button class="btn btn-outline-primary">Outline Button</button>
    </div>

  </div>

  @include('themes/wellmedic/partials/footer')
  
<script src="{{ url('themes/wellmedic/js/index.js') }}"></script>
</body>
</html>