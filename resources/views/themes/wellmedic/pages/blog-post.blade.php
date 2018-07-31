@extends('themes.'.$theme.'.index')

@section('title')
  Wellmedic - {{ $post->title }}
@endsection

@section('seo_social_stuff')
  <meta name="description" content="{{ $post->short }}" />
  <meta name="keywords" content="{{ $settings->keywords }}" />
  <meta name="author" content="Mini STUDIO Publishing Group">

  <!-- Facebok Open Graph -->
  <meta property="og:title" content="Wellmedic - {{ $post->title }}"/>
  <meta property="og:image" content="{{ url($post->image) }}"/>
  <meta property="og:type" content="article"/>
  <meta property="og:url" content="{{ url('blog/'.$post->slug.'/'.$post->id) }}"/>
  <meta property="og:site_name" content="{{ $post->title }}"/>
  <meta property="og:description" content="{{ $post->short }}" />
  <!-- Facebok Open Graph Kraj-->

  <!-- ITEM za GOOGLE + -->
  <meta itemprop="name" content="Wellmedic - {{ $post->title }}" />
  <meta itemprop="description" content="{{ $post->short }}" />
  <meta itemprop="image" content="{{ url($post->image) }}" />
  <!-- ITEM za GOOGLE + END -->

  <!-- ITEM Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@wellmedic">
  <meta name="twitter:creator" content="@wellmedic">
  <meta name="twitter:title" content="Wellmedic - {{ $post->title }}">
  <meta name="twitter:description" content="{{ $post->short }}">
  <meta name="twitter:image" content="{{ url($post->image) }}">
  <!-- ITEM Twitter END -->
@endsection

@section('content')

  <div class="section position-relative">
    <div class="hero" id="hero">
      <h1 class="title hero_title">Blog</h1>
      <figure class="plant plant--spoon">
        <img src="{{ url('themes/wellmedic/images/plants/spoon.png') }}" alt="drvena kašika">
      </figure>
    </div>
    <div id="breadcrumb">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Početna</a></li>
            <li class="breadcrumb-item"><a href="{{ url('blog') }}">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div class="container section">
    <div class="row">
      <div class="col-xl-9 col-lg-8 mb-5">
        <p class="caption caption--big">{{ \Carbon\Carbon::parse($post->publish_at)->format('d. M Y.') }}</p>
        <h2 class="subheading subheading--big">{{ $post->title }}</h2>

        <div id="blog-post"><!-- cms content -->
          {!! $post->body !!}
        </div><!-- /cms content -->

        <div class="d-flex justify-content-between"><!-- navigation -->

            <div class="go go--prev">
              @if(!empty($prev))
              <a href="{{ url('blog/'.$prev->slug.'/'.$prev->id) }}" class="go_control">
                <span class="arrow arrow--prev">
                  <svg class="icon">
                    <use xlink:href="#icon_arrow" />
                  </svg>
                </span>
                Prethodni post
              </a>
              <h3 class="subheading">{{ $prev->title }}</h3>
              @endif
            </div>
            <div class="go go--next">
              @if(!empty($next))
              <a href="{{ url('blog/'.$next->slug.'/'.$next->id) }}" class="go_control">
                Sledeći post
                <span class="arrow arrow--next">
                  <svg class="icon">
                    <use xlink:href="#icon_arrow" />
                  </svg>
                </span>
              </a>
              <h3 class="subheading">{{ $next->title }}</h3>
              @endif
            </div>

        </div><!-- /navigation -->

      </div>
      <aside class="col-xl-3 col-lg-4">
        @if(count($testimonials)>0)
        <h2 class="title"><span class="thin">Iskustva</span> korisnika</h2>
        <div class="row">
          @foreach($testimonials as $testimonial)
          <div class="col-lg-12 col-md-4 mb-3">
            @component('themes.'.$theme.'.components.quote', [
              'body' => $testimonial->body,
              'author' => $testimonial->author,
              'data_href' => $testimonial->post? url('blog/'.$testimonial->post->slug . '/' . $testimonial->post->id) : '#',
              'href' => $testimonial->link,
            ])
            @endcomponent
          </div>
          @endforeach
        </div>
        <div class="text-center py-2">
          <a href="{{ url('iskustva/'.$post->product->slug.'/'.$post->product->id) }}" class="btn btn-outline-primary">Ostala iskustva</a>
        </div>
        @endif
      </aside>
    </div>
  </div>

  @include('themes.'.$theme.'.partials.products.posts')

@endsection