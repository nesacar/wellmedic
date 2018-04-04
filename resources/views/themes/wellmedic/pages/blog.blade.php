@extends('themes.wellmedic.index')
@section('title')
  {{ $title }}
@endsection
@section('content')
  <div class="section position-relative">
    <div class="hero" id="hero">
      <h1 class="title hero_title">Blog</h1>
      <figure class="plant plant--spoon">
        <img src="{{ url('themes/wellmedic/images/demo/spoon.png') }}" alt="drvena kašika">
      </figure>
    </div>
    <div id="breadcrumb">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Početna</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div class="container section">
    <div class="row">
      @for ($i = 0; $i < 8; $i++)
        <div class="mb-3 {{ ($i < 2) ? 'col-lg-6' : 'col-lg-4' }}">
          @component('themes.wellmedic.components.article-entry')
            @slot('imageLg')
              {{ url('themes/wellmedic/images/demo/tile-img.jpg') }}
            @endslot
            @slot('imageSm')
              {{ url('themes/wellmedic/images/demo/tile-img-sm.jpg') }}
            @endslot
            @slot('date')
              30. Decembar 2017
            @endslot
            @slot('title')
              Izbor kraljevskih i plemićkih porodica
            @endslot
            @slot('body')
              Rog mladog jelena je na listi tri najveće dragocenosti na severoistoku Kine. Mladi rogovi jelena predstavljaju izuzetno dragocen kineski sirov lek. Kapsule se pripremaju isključivo iz prve serije duplih rogova koji se sakupljaju u mesecu maju. Ovi prvi, mladi rogovi su osnovni, najhranljiviji i najtraženiji.
            @endslot
            @slot('articleURL')
              #
            @endslot
            @slot('commentsURL')
              #
            @endslot
            @slot('count')
              9
            @endslot
          @endcomponent
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