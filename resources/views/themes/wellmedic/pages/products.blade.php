@extends('themes.wellmedic.index')

@section('title')
  Proizvodi
@endsection

@section('content')
  <div class="section position-relative">
    <div class="hero" id="hero">
      <h1 class="title hero_title">proizvodi</h1>
      <figure class="plant plant--spoon">
        <img src="{{ url('themes/wellmedic/images/demo/spoon.png') }}" alt="drvena kašika">
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

  @include('themes.'.$theme.'.partials.products.posts')

@endsection