<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wellmedic - @yield('title')</title>
    <link rel="stylesheet" href="{{ url('themes/wellmedic/css/index.css') }}">
</head>
<body>
  @include('themes/wellmedic/partials/header')

  <h1 class="headline">Headline</h1>
  <h2 class="title"><span class="thin">Prefix</span> Title</h2>
  <p class="caption">Caption</p>
  <h3 class="subheading">Subheading</h3>
  <p>This is a block of text.</p>
  
<script src="{{ url('themes/wellmedic/js/index.js') }}"></script>
</body>
</html>