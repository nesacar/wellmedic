@extends('themes.'.$theme.'.index')

@section('title')
  Iskustva korinsika
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
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Početna</a></li>
            <li class="breadcrumb-item active" aria-current="page">Izjave korisnikas</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  @if(count($testimonials)>0)
  <div class="container section">
    <div class="row">
      @foreach($testimonials as $testimonial)
      <div class="col-lg-4 col-md-6 mb-3">
        @component('themes.'.$theme.'.components.quote', [
          'body' => $testimonial->body,
          'author' => $testimonial->author,
          'href' => '#'
        ])
        @endcomponent
      </div>
      @endforeach
    </div>
  </div>

  <div class="container section" id="pagination">
    <nav aria-label="paginacija">
      {{ $testimonials->links() }}
    </nav>
  </div>
  @endif
@endsection