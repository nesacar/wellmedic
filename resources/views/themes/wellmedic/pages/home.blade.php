@extends('themes.wellmedic.index')
@section('title')
  {{ $title }}
@endsection
@section('content')
  <div class="container">
    <h2 class="title"><span class="thin">Iskustva</span> korisnika</h2>
  </div>

  <div class="container">
    <div class="row">

      @foreach ($items as $item)
      <div class="col-lg-4">
        <div class="card mb-3 with-shadow">
          <a class="link" href="#">
            <div class="card-body product-card">
              <div class="product-card_thumbnail">
                <img
                  class="" 
                  src="https://cdn7.bigcommerce.com/s-u0uja8gg4w/images/stencil/500x650/products/155/668/B000178_use__01779.1519163981.png?c=2" 
                  alt="genoderma lucidium"
                >
              </div>
              <div class="product-card_description">
                <span class="caption">{{ $item->categorie}}</span>
                <h3 class="subheading">{{ $item->name}}</h3>
                <p>{{ $item->about}}</p>
              </div>
            </div>
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <div class="container">
    <h2 class="title"><span class="thin">Naš</span> blog</h2>
  </div>
@endsection