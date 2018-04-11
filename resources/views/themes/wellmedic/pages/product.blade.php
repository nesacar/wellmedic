@extends('themes.'.$theme.'.index')

@section('title')
  {{ $product->title }}
@endsection

@section('content')

  <div class="section position-relative">
    <div class="hero" id="hero">
      <h1 class="title hero_title">Proizvodi</h1>
      <figure class="plant plant--spoon">
        <img src="{{ url('themes/wellmedic/images/demo/spoon.png') }}" alt="drvena kašika">
      </figure>
    </div>
    <div id="breadcrumb">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Početna</a></li>
            <li class="breadcrumb-item"><a href="{{ url('proizvodi') }}">Proizvodi</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div class="container section">
    <div class="row">
      <div class="col-xl-9 col-lg-8">
        <div class="mb-4">
          <p class="caption caption--big">{{ $product->overTitle }}</p>
          <h2 class="headline">{{ $product->title }}</h2>
          <p class="tag-line">{{ $product->subTitle }}</p>
        </div>
        <div id="product"><!-- cms content -->
          {!! $product->body !!}
        </div><!-- /cms content -->
      </div>

      <aside class="col-xl-3 col-lg-4">
        @if(count($testimonials)>0)
        <h2 class="title"><span class="thin">Iskustva</span> korisnika</h2>
        <div class="row">
          @foreach($testimonials as $testimonial)
          <div class="col-lg-12 col-md-4 mb-3">
            @component('themes.'.$theme.'.components.quote', [
              'body' => $testimonial->body,
              'author' => $testimonial->author,
              'href' => '#'
            ])
            @endcomponent
          </div>
          @endforeach
        </div>
        <div class="text-center py-2">
          <a href="{{ url('iskustva/'.$product->slug.'/'.$product->id) }}" class="btn btn-outline-primary">Ostala iskustva</a>
        </div>
        @endif
      </aside>
    </div>
  </div>

  @include('themes.'.$theme.'.partials.products.posts')

@endsection