@extends('themes.wellmedic.index')
@section('title')
  {{ $title }}
@endsection
@section('content')

  <div class="section position-relative">
    <div class="hero" id="hero">
      <h1 class="title hero_title">O Nama</h1>
      <figure class="plant plant--spoon">
        <img src="{{ url('themes/wellmedic/images/demo/spoon.png') }}" alt="drvena kašika">
      </figure>
    </div>
    <div id="breadcrumb">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Početna</a></li>
            <li class="breadcrumb-item active" aria-current="page">O nama</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div class="container section">
    about..
  </div>
@endSEction