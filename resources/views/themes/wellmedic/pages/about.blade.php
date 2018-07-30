@extends('themes.'.$theme.'.index')

@section('title')
  Wellmedic - O nama
@endsection

@section('seo_social_stuff')
  <meta name="description" content="{!! $settings->desc !!}" />
  <meta name="keywords" content="{{ $settings->keywords }}" />
  <meta name="author" content="Mini STUDIO Publishing Group">

  <!-- Facebok Open Graph -->
  <meta property="og:title" content="Wellmedic - O nama"/>
  <meta property="og:image" content="{{ url('themes/'.$theme.'/images/wellmedic-social-share.jpg') }}"/>
  <meta property="og:type" content="article"/>
  <meta property="og:url" content="{{ url('o-nama') }}"/>
  <meta property="og:site_name" content="{{ $settings->title }}"/>
  <meta property="og:description" content="{!! $settings->desc !!}" />
  <!-- Facebok Open Graph Kraj-->

  <!-- ITEM za GOOGLE + -->
  <meta itemprop="name" content="Wellmedic - O nama" />
  <meta itemprop="description" content="{!! $settings->desc !!}" />
  <meta itemprop="image" content="{{ url('themes/'.$theme.'/images/wellmedic-social-share.jpg') }}" />
  <!-- ITEM za GOOGLE + END -->

  <!-- ITEM Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@wellmedic">
  <meta name="twitter:creator" content="@wellmedic">
  <meta name="twitter:title" content="Wellmedic - O nama">
  <meta name="twitter:description" content="{!! $settings->desc !!}">
  <meta name="twitter:image" content="{{ url('themes/'.$theme.'/images/wellmedic-social-share.jpg') }}">
  <!-- ITEM Twitter END -->
@endsection

@section('content')

  <div class="section position-relative">
    <div class="hero" id="hero">
      <h1 class="title hero_title">O Nama</h1>
      <figure class="plant plant--spoon">
        <img src="{{ url('themes/wellmedic/images/plants/spoon.png') }}" alt="drvena kašika">
      </figure>
    </div>
    <div id="breadcrumb">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Početna</a></li>
            <li class="breadcrumb-item active" aria-current="page">O nama</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div id="about" class="container section">
    <div class="row about">
      <div class="col-lg-5">
        <div class="image lazy-image"
          data-src="{{ url('themes/wellmedic/images/about/mushrooms.jpg') }}"
        ></div>
      </div>
      <div class="col-lg-7">
        <h1 class="about_logo">
          <img src="{{ url('themes/wellmedic/images/wellmedic-logo.png') }}" alt="wellmedic logo">
        </h1>
        <p>WELLMEDIC d.o.o. je ekskluzivni uvoznik, distributer i zastupnik za Evropu kompanije Nanjing Xiyan Bio-Pharmaceutical Technology Co, Ltd, koja je svetski lider u proizvodnji vrhunskih preparata baziranih na tradicionalnoj kineskoj medicini.</p>
        <p>Od 2015. godine pouzdanom i brzom uslugom, kao i kvalitetnim prirodnim preparatima od sirovina iz organskog usgoja radimo u službi Vašeg zdravlja, trudeći se da budete ZDRAVI, LEPI I SREĆNI.</p>
        <div class="d-flex align-items-center primary">
          <span class="mr-3">Pratite nas na:</span>
          <ul class="social">
            <li class="social_item">
              <a href="{{ $settings->facebook }}" target="_blank" rel="noopener noreferrer" aria-label="pratite nas na facebooku">
                <svg class="icon" role="presentation">
                  <use xlink:href="#icon_facebook">
                </svg>
              </a>
            </li>
            <li class="social_item">
              <a href="{{ $settings->instagram }}" target="_blank" rel="noopener noreferrer" aria-label="pratite nas na instagramu">
                <svg class="icon" role="presentation">
                  <use xlink:href="#icon_instagram">
                </svg>
              </a>
            </li>
            <li class="social_item">
              <a href="{{ $settings->twitter }}" target="_blank" rel="noopener noreferrer" aria-label="pratite nas na twitteru">
                <svg class="icon" role="presentation">
                  <use xlink:href="#icon_twitter">
                </svg>
              </a>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </div>

  <div class="container section">
    <p class="primary text-center">Pozivamo potencijalne partnere da nas kontaktiraju za prodaju i distribuciju pominjanih proizvoda.<br/>Kontakt: <a href="mailto:office@wellmedic.rs">office@wellmedic.rs</a></p>
  </div>
@endSEction