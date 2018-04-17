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

  <aside class="dialog dialog--visible">
    <div class="dialog_surface">
      <a href="#" class="dialog_close-btn" role="button" tabindex="1">Zatvori</a>
      <div class="quote quote--dialog">
        <div class="quote_icon">
          <svg class="icon" role="presentation">
            <use xlink:href="#icon_quote">
          </svg>
        </div>
        <div class="quote_info">
          <p class="quote_text">
            <em>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita dolorum harum, iusto doloremque voluptatibus ea doloribus, odio atque laboriosam porro asperiores excepturi incidunt amet recusandae totam voluptate ullam nihil corrupti.</em>
          </p>
          <div class="action-footer">
            <a href="#" class="quote_author" tabindex="2">Vaca San</a>
            <a href="#" class="btn btn-primary" tabindex="3">Saznajte više</a>
          </div>
        </div>
      </div>
    </div>
    <div class="dialog_backdrop"></div>
  </aside>

<script>
  window.app_url = "{{ url('/') }}";
</script>

<script src="{{ url('themes/wellmedic/js/index.js') }}"></script>
@yield('footer_scripts')
</body>
</html>