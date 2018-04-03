@extends('themes.wellmedic.index')
@section('title')
  {{ $title }}
@endsection
@section('content')
<div class="section" style="padding-top: 80px;">
  @foreach ($items as $i => $item)
  @php $isOdd = (($i % 2) != 0); @endphp
    <div class="product {{ $isOdd ? 'product--alt' : '' }}">
      <div class="container product_container">
        <div class="row {{ $isOdd ? 'flex-row-reverse' : '' }}">
          <div class="col-md-8">
            <p class="caption">{{ $item->categorie}}</p>
            <h1 class="headline">{{ $item->name }}</h1>
            <p class="tag-line">{{ $item->tagline }}</p>
            <p>{{ $item->about }}</p>
            <a class="btn btn-primary" href="#">Saznajte više</a>
          </div>
          <div class="col-md-4">
            slika
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
@endsection