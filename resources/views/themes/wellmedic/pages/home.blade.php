@extends('themes.wellmedic.index')

@section('title')
    Wellmedic - Veleprodaja medicinskih sredstava
@endsection

@section('seo_social_stuff')
    <meta name="description" content="{!! $settings->desc !!}" />
    <meta name="keywords" content="{{ $settings->keywords }}" />
    <meta name="author" content="Mini STUDIO Publishing Group">

    <!-- Facebok Open Graph -->
    <meta property="og:title" content="{{ $settings->title }}"/>
    <meta property="og:image" content="{{ url('themes/'.$theme.'/images/wellmedic-social-share.jpg') }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ url('/') }}"/>
    <meta property="og:site_name" content="{{ $settings->title }}"/>
    <meta property="og:description" content="{!! $settings->desc !!}" />
    <!-- Facebok Open Graph Kraj-->

    <!-- ITEM za GOOGLE + -->
    <meta itemprop="name" content="{{ $settings->title }}" />
    <meta itemprop="description" content="{!! $settings->desc !!}" />
    <meta itemprop="image" content="{{ url('themes/'.$theme.'/images/wellmedic-social-share.jpg') }}" />
    <!-- ITEM za GOOGLE + END -->

    <!-- ITEM Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@wellmedic">
    <meta name="twitter:creator" content="@wellmedic">
    <meta name="twitter:title" content="{{ $settings->title }}">
    <meta name="twitter:description" content="{!! $settings->desc !!}">
    <meta name="twitter:image" content="{{ url('themes/'.$theme.'/images/wellmedic-social-share.jpg') }}">
    <!-- ITEM Twitter END -->
@endsection

@section('content')
  <div class="section">
    <div class="swiper-container is-loading" data-name="masthead">
      <div class="swiper-wrapper">

        @foreach ($sliders as $slider)
        <div class="swiper-slide masthead">
          <div class="image image--masthead fit-height">
            {{--<picture>--}}
              {{--<source media="(min-width: 768px)"--}}
                {{--srcset="https://images.pexels.com/photos/72161/pexels-photo-72161.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"--}}
              {{--><!-- velika -->--}}
              {{--<img src="https://images.pexels.com/photos/443416/pexels-photo-443416.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" /><!-- mala -->--}}
            {{--</picture>--}}
             <img src="{{ url($slider->image) }}" alt="{{ $slider->title }}" />
          </div>
          <div class="masthead_wrap">
            <div class="container">
              <div class="masthead_content">
                <h1 class="headline">{{ $slider->title}}</h1>
                <p class="d-none d-sm-block">{{ $slider->subtitle }}</p>
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

  {{--@include('themes.'.$theme.'.partials.home.posts')--}}

@endsection

@section('footer_scripts')
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