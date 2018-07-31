@extends('themes.wellmedic.index')

@section('title')
  Wellmedic - Proizvodi
@endsection

@section('seo_social_stuff')
  <meta name="description" content="{!! $settings->desc !!}" />
  <meta name="keywords" content="{{ $settings->keywords }}" />
  <meta name="author" content="Mini STUDIO Publishing Group">

  <!-- Facebok Open Graph -->
  <meta property="og:title" content="Wellmedic - Proizvodi"/>
  <meta property="og:image" content="{{ url('themes/'.$theme.'/images/wellmedic-social-share.jpg') }}"/>
  <meta property="og:type" content="article"/>
  <meta property="og:url" content="{{ url('/') }}"/>
  <meta property="og:site_name" content="{{ $settings->title }}"/>
  <meta property="og:description" content="{!! $settings->desc !!}" />
  <!-- Facebok Open Graph Kraj-->

  <!-- ITEM za GOOGLE + -->
  <meta itemprop="name" content="Wellmedic - Proizvodi" />
  <meta itemprop="description" content="{!! $settings->desc !!}" />
  <meta itemprop="image" content="{{ url('themes/'.$theme.'/images/wellmedic-social-share.jpg') }}" />
  <!-- ITEM za GOOGLE + END -->

  <!-- ITEM Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@wellmedic">
  <meta name="twitter:creator" content="@wellmedic">
  <meta name="twitter:title" content="Wellmedic - Proizvodi">
  <meta name="twitter:description" content="{!! $settings->desc !!}">
  <meta name="twitter:image" content="{{ url('themes/'.$theme.'/images/wellmedic-social-share.jpg') }}">
  <!-- ITEM Twitter END -->
@endsection

@section('content')
  <div class="section position-relative">
    <div class="hero" id="hero">
      <h1 class="title hero_title">proizvodi</h1>
      <figure class="plant plant--spoon">
        <img src="{{ url('themes/wellmedic/images/plants/spoon.png') }}" alt="drvena kašika">
      </figure>
    </div>
    <div id="breadcrumb">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Početna</a></li>
            <li class="breadcrumb-item active" aria-current="page">Proizvodi</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  @include('themes.'.$theme.'.partials.products.products')

  {{--@include('themes.'.$theme.'.partials.products.posts')--}}

@endsection