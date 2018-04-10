@extends('themes.wellmedic.index')

@section('title')
  Veleprodaja medicinskih sredstava
@endsection

@section('content')
  <div class="section">
    <div class="swiper-container is-loading" data-name="masthead">
      <div class="swiper-wrapper">

        @foreach ($sliders as $slider)
        <div class="swiper-slide masthead">
          <div class="image image--masthead fit-height">
            <img src="{{ url($slider->image) }}" alt="{{ $slider->title }}" />
          </div>
          <div class="masthead_wrap">
            <div class="container">
              <div class="masthead_content">
                <h1 class="headline">{{ $slider->title}}</h1>
                <p>{{ $slider->subtitle }}</p>
                <a class="btn btn-primary" href="#">Saznajte više</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <div class="container section">
    <h2 class="title"><span class="thin">Iskustva</span> korisnika</h2>
    <div class="carousel carousel--quotes">
      <div class="swiper-container is-loading" data-name="quotes">
        <div class="swiper-wrapper">

          @for ($i = 0; $i < 5; $i++)
          <div class="swiper-slide">
            @component('themes.wellmedic.components.quote', [
              'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eros tortor, consectetur non laoreet vitae, ornare vel ex. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non erat lorem',
              'author' => 'John Snow',
              'href' => '#'
            ])
            @endcomponent
          </div>
          @endfor
          
        </div>
      </div>
      <div class="controls">
        <button class="btn-icon arrow arrow--prev">
          <svg class="icon">
            <use xlink:href="#icon_arrow" />
          </svg>
        </button>
        <button class="btn-icon arrow arrow--next">
          <svg class="icon">
            <use xlink:href="#icon_arrow" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <div class="container section">
    <div class="position-relative">
      <div
        id="banner-image"
        class="image image--banner mb-3 lazy-image"
        data-src="{{ url('themes/wellmedic/images/demo/banner.jpg') }}"
        style="background-image: url({{ url('themes/wellmedic/images/demo/banner-sm.jpg') }});"
      ></div>
      <div class="card banner" id="banner">
        <div class="card-body">
          <div class="headline banner_headline">želimo vam dobro</div>
          <div class="subheading banner_subheading">Budite spremni, lepi i zdravi</div>
        </div>
      </div>
    </div>
  </div>

  <div class="container section">
    <div class="row">

      @foreach ($items as $item)
      <div class="col-lg-4 mb-3">
        <div class="card product-card with-shadow">
          <a class="link product-card_link" href="#">
            <div class="card-body product-card_body">
              <div class="product-card_thumbnail">
                <div class="image image--thumbnail fit-height lazy-image"
                  data-src="https://cdn7.bigcommerce.com/s-u0uja8gg4w/images/stencil/500x650/products/155/668/B000178_use__01779.1519163981.png?c=2"
                  data-alt="genoderma lucidium"
                  >
                </div>
              </div>
              <div class="product-card_description">
                <span class="caption">{{ $item->categorie}}</span>
                <h3 class="subheading">{{ $item->name}}</h3>
                <p class="product-card_info">{{ $item->about}}</p>
              </div>
            </div>
          </a>
        </div>
      </div>
      @endforeach

    </div>
  </div>

  <div class="container section">
    <h2 class="title"><span class="thin">Naš</span> blog</h2>

    <div class="row">
      <div class="col-lg-7">
        <div class="article-entry">
          <div
            class="image mb-3 lazy-image"
            data-src="{{ url($posts[0]->image) }}"
            style="background-image: url({{ Imagecache::get($posts[0]->image, 'image')->src }});"
          ></div>
          <div class="caption">30. Decembar 2017</div>
          <h3 class="subheading">Izbor kraljevskih i plemićkih porodica</h3>
          <p>Rog mladog jelena je na listi tri najveće dragocenosti na severoistoku Kine. Mladi rogovi jelena predstavljaju izuzetno dragocen kineski sirov lek.</p>
          <p>Kapsule se pripremaju isključivo iz prve serije duplih rogova koji se sakupljaju u mesecu maju. Ovi prvi , mladi rogovi su osnovni , najhranljiviji i najtraženiji.</p>
          <a href="#" class="btn btn-outline-primary">Pročitaj više</a>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="article-entry">
          <div
            class="image image--alt mb-3 lazy-image"
            data-src="{{ url($posts[1]->image) }}"
            style="background-image: url({{ Imagecache::get($posts[1]->image, 'alt')->src }});"
          ></div>
          <div class="caption">30. Decembar 2017</div>
          <div class="action-footer">
            <h3 class="subheading">Neverovatni sastojci</h3>
            <a href="#" class="btn btn-outline-primary">Pročitaj više</a>
          </div>
        </div>
        <div class="article-entry">
          <div
            class="image image--alt mb-3 lazy-image"
            data-src="{{ url($posts[2]->image) }}"
            style="background-image: url({{ Imagecache::get($posts[2]->image, 'alt')->src }});"
          ></div>
          <div class="caption">30. Decembar 2017</div>
          <div class="action-footer">
            <h3 class="subheading">Hiljadugodisnja tradicionalna kineska medicina</h3>
            <a href="#" class="btn btn-outline-primary">Pročitaj više</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    (function () {
      function loadScript () {
        var resource = document.createElement('script');
        resource.src = "{{ url('/themes/wellmedic/js/home.js') }}";
        resource.async = 'true';
        document.head.appendChild(resource);
      }

      window.onload = function () {
        loadScript();
      };
    }());
  </script>
@endsection