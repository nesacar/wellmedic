@extends('themes.wellmedic.index')
@section('title')
  {{ $title }}
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
            <li class="breadcrumb-item"><a href="/">Početna</a></li>
            <li class="breadcrumb-item active" aria-current="page">Proizvodi</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div class="section">
  @foreach ($items as $i => $item)
  @php $isOdd = (($i % 2) == 0); @endphp
    <div class="product {{ $isOdd ? '' : 'product--alt paper-rip' }}">
      <div class="container product_container">
        <div class="row {{ $isOdd ? 'flex-row-reverse' : '' }}">
          <div class="col-md-5">
            <div
              class="image image--square mb-3 lazy-image"
              data-src="https://cdn7.bigcommerce.com/s-u0uja8gg4w/images/stencil/500x650/products/155/668/B000178_use__01779.1519163981.png?c=2"
            ></div>
          </div>
          <div class="col-md-7 product_desc">
            <div class="py-4">
              <p class="caption caption--big">{{ $item->categorie}}</p>
              <h2 class="headline">{{ $item->name }}</h2>
              <p class="tag-line">{{ $item->tagline }}</p>
              <p>{{ $item->about }}</p>
              <div class="action-footer">
                <a class="btn btn-primary" href="#">Saznajte više</a>
                <a href="#" title="iskustva" class="action-footer_comments">
                  <svg class="icon" role="presentation">
                    <use xlink:href="#icon_comment" />
                  </svg>
                  <span class="action-footer_comments_desc product_comments-desc">Iskustva naših korisnika</span>18
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <div class="container section">
    <h2 class="title"><span class="thin">Naš</span> blog</h2>
    <div class="row">
      @for ($i = 0; $i < 3; $i++)
        <div class="col-lg-4">
          @component('themes.wellmedic.components.article-entry', [
            'imageLg' => url('themes/wellmedic/images/demo/tile-img.jpg'),
            'imageSm' => url('themes/wellmedic/images/demo/tile-img-sm.jpg'),
            'date' => '30. Decembar 2017',
            'title' => 'Izbor kraljevskih i plemićkih porodica',
            'body' => 'Rog mladog jelena je na listi tri najveće dragocenosti na severoistoku Kine. Mladi rogovi jelena predstavljaju izuzetno dragocen kineski sirov lek. Kapsule se pripremaju isključivo iz prve serije duplih rogova koji se sakupljaju u mesecu maju. Ovi prvi, mladi rogovi su osnovni, najhranljiviji i najtraženiji.',
            'articleURL'=> '#',
            'commentsURL'=> '#',
            'count'=> '9'
          ])
          @endcomponent
        </div>
      @endfor
    </div>
  </div>
@endsection