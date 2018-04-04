@extends('themes.wellmedic.index')
@section('title')
  {{ $title }}
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
            <li class="breadcrumb-item"><a href="/">Početna</a></li>
            <li class="breadcrumb-item active" aria-current="page">Izjave korisnikas</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div class="container section">
    <div class="row">
      @for ($i = 0; $i < 12; $i++)
      <div class="col-lg-4 col-md-6 quote mb-3">
        <div class="quote_icon">
          <svg class="icon" role="presentation">
            <use xlink:href="#icon_quote">
          </svg>
        </div>
        <div class="quote_info">
          <p class="quote_text with-trunk">
            <em>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eros tortor, consectetur non laoreet vitae, ornare vel ex. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non erat lorem.</em>
          </p>
          <p class="quote_author">John Snow</p>
        </div>
      </div>
      @endfor
    </div>
  </div>

  <div class="container section" id="pagination">
    <nav aria-label="paginacija">
      <ul class="pagination">
        <li class="page-item disabled">
          <a class="page-link arrow arrow--prev" aria-label="Predhodna strana" href="#">
            <span class="sr-only">Predhodna</span>
            <svg class="icon">
              <use xlink:href="#icon_arrow" />
            </svg>
          </a>
        </li>
        <li class="page-item active">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link arrow arrow--next" aria-label="Sledeća strana" href="#">
            <span class="sr-only">Sledeća</span>
            <svg class="icon">
              <use xlink:href="#icon_arrow" />
            </svg>
          </a>
        </li>
      </ul>
    </nav>
  </div>
@endsection