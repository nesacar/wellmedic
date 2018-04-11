@extends('themes.wellmedic.index')

@section('title')
  Veleprodaja medicinskih sredstava
@endsection

@section('content')
  <div class="section">
    <div class="swiper-container is-loading" data-name="masthead">
      <div class="swiper-wrapper">

        @foreach ($sliders as $slider)
        <div class="swiper-slide masthead">
          <div class="image image--masthead fit-height">
            <img src="{{ url($slider->image) }}" alt="{{ $slider->title }}" />
          </div>
          <div class="masthead_wrap">
            <div class="container">
              <div class="masthead_content">
                <h1 class="headline">{{ $slider->title}}</h1>
                <p>{{ $slider->subtitle }}</p>
                <a class="btn btn-primary" href="#">Saznajte više</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  @include('themes.'.$theme.'.partials.home.testimonials')

  @include('themes.'.$theme.'.partials.home.banner')

  @include('themes.'.$theme.'.partials.home.products')

  @include('themes.'.$theme.'.partials.home.posts')

  <script type="text/javascript">
    (function () {
      function loadScript () {
        var resource = document.createElement('script');
        resource.src = "{{ url('/themes/wellmedic/js/home.js') }}";
        resource.async = 'true';
        document.head.appendChild(resource);
      }

      window.onload = function () {
        loadScript();
      };
    }());
  </script>
@endsection