@extends('themes.'.$theme.'.index')

@section('title')
  Wellmedic - Iskustva korinsika
@endsection

@section('seo_social_stuff')
  <meta name="description" content="{!! $settings->desc !!}" />
  <meta name="keywords" content="{{ $settings->keywords }}" />
  <meta name="author" content="Mini STUDIO Publishing Group">

  <!-- Facebok Open Graph -->
  <meta property="og:title" content="Wellmedic - Iskustva korinsika"/>
  <meta property="og:image" content="{{ url('themes/'.$theme.'/images/wellmedic-social-share.jpg') }}"/>
  <meta property="og:type" content="article"/>
  <meta property="og:url" content="{{ url('iskustva') }}"/>
  <meta property="og:site_name" content="{{ $settings->title }}"/>
  <meta property="og:description" content="{!! $settings->desc !!}" />
  <!-- Facebok Open Graph Kraj-->

  <!-- ITEM za GOOGLE + -->
  <meta itemprop="name" content="Wellmedic - Iskustva korinsika" />
  <meta itemprop="description" content="{!! $settings->desc !!}" />
  <meta itemprop="image" content="{{ url('themes/'.$theme.'/images/wellmedic-social-share.jpg') }}" />
  <!-- ITEM za GOOGLE + END -->

  <!-- ITEM Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@wellmedic">
  <meta name="twitter:creator" content="@wellmedic">
  <meta name="twitter:title" content="Wellmedic - Iskustva korinsika">
  <meta name="twitter:description" content="{!! $settings->desc !!}">
  <meta name="twitter:image" content="{{ url('themes/'.$theme.'/images/wellmedic-social-share.jpg') }}">
  <!-- ITEM Twitter END -->
@endsection

@section('content')
  <div class="section position-relative">
    <div class="hero" id="hero">
      <h1 class="title hero_title">Iskustva korisnika</h1>
      <figure class="plant plant--spoon">
        <img src="{{ url('themes/wellmedic/images/demo/spoon.png') }}" alt="drvena kašika">
      </figure>
    </div>
    <div id="breadcrumb">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Početna</a></li>
            <li class="breadcrumb-item active" aria-current="page">Izjave korisnikas</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  @if(count($testimonials)>0)
  <div class="container section">
    <div class="row">
      @foreach($testimonials as $testimonial)
      <div class="col-lg-4 col-md-6 mb-3">
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

    <div id="pagination">
      <nav aria-label="paginacija">
        {{ $testimonials->links() }}
      </nav>
    </div>
    
  </div>
  @endif
@endsection