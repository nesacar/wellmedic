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
            <li class="breadcrumb-item"><a href="/blog">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">Title</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div class="container section">
    <div class="row">
      <div class="col-xl-9 col-lg-8 mb-5">
        <p class="caption caption--big">31 Decembar 2017</p>
        <h2 class="subheading subheading--big">Izbor kraljevskih i plemićkih porodica</h2>
        <div class="image lazy-image my-4"
          data-src="{{ url('themes/wellmedic/images/demo/tile-img.jpg') }}"
          style="background-image: url({{ url('themes/wellmedic/images/demo/tile-img-sm.jpg') }});"
        ></div>
        <div id="blog-post"><!-- cms content -->

        </div><!-- /cms content -->

        <div class="d-flex justify-content-between"><!-- navigation -->
          <div class="go go--prev">
            <a href="#" class="go_control">
              <span class="arrow arrow--prev">
                <svg class="icon">
                  <use xlink:href="#icon_arrow" />
                </svg>
              </span>
              Prethodni post
            </a>
            <h3 class="subheading">Neverovatni sastojci</h3>
          </div>
          <div class="go go--next">
            <a href="#" class="go_control">
              Sledeći post
              <span class="arrow arrow--next">
                <svg class="icon">
                  <use xlink:href="#icon_arrow" />
                </svg>
              </span>
            </a>
            <h3 class="subheading">Izbor kraljevskih i plemićkih porodica</h3>
          </div>
        </div><!-- /navigation -->

      </div>
      <aside class="col-xl-3 col-lg-4">
        <h2 class="title"><span class="thin">Iskustva</span> korisnika</h2>
        <div class="row">
          @for ($i = 0; $i < 3; $i++)
          <div class="col-lg-12 col-md-4 mb-3">
            @component('themes.wellmedic.components.quote', [
              'body' => 'Rog mladog jelena je na listi tri najveće dragocenosti na severoistoku Kine. Mladi rogovi jelena predstavljaju izuzetno dragocen kineski sirov lek.',
              'author' => 'Vaca San'
            ])
            @endcomponent
          </div>
          @endfor
        </div>
        <div class="text-center py-2">
          <a href="/experiences" class="btn btn-outline-primary">Ostala iskustva</a>
        </div>
      </aside>
    </div>
  </div>

  <div class="container section">
    <h2 class="title"><span class="thin">Povezane</span> teme</h2>
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