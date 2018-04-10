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

  <div id="about" class="container section">
    <div class="row about">
      <div class="col-lg-5">
        <div class="image lazy-image"
          data-src="https://images.pexels.com/photos/259704/pexels-photo-259704.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
        ></div>
      </div>
      <div class="col-lg-7">
        <h1 class="about_logo">
          <img src="{{ url('themes/wellmedic/images/wellmedic-logo.png') }}" alt="wellmedic logo">
        </h1>
        <p>WELLMEDIC d.o.o. Srbija, sa sedištem u Beogradu ul. Kneza Mihajla br. 17. je jedna od najperspektivnijih veleprodaja medicinske opreme i dijetetskih suplemenata u regionu.<br/>Poznati smo po bogatom asortimanu opreme i proizboda kao i po brzoj i pouzdanoj dostavi.</p>
        <div class="d-flex align-items-center primary">
          <span class="mr-3">Pratite nas na:</span>
          <ul class="social">
            <li class="social_item">
              <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer" aria-label="pratite nas na facebooku">
                <svg class="icon" role="presentation">
                  <use xlink:href="#icon_facebook">
                </svg>
              </a>
            </li>
            <li class="social_item">
              <a href="https://www.instagram.com/?hl=en" target="_blank" rel="noopener noreferrer" aria-label="pratite nas na instagramu">
                <svg class="icon" role="presentation">
                  <use xlink:href="#icon_instagram">
                </svg>
              </a>
            </li>
            <li class="social_item">
              <a href="https://twitter.com/?lang=en" target="_blank" rel="noopener noreferrer" aria-label="pratite nas na twitteru">
                <svg class="icon" role="presentation">
                  <use xlink:href="#icon_twitter">
                </svg>
              </a>
            </li>
          </ul>
        </div>

      </div>
    </div>
    <div class="row flex-row-reverse about">
      <div class="col-lg-4">
        <div class="image image--square fit-height lazy-image"
          data-src="https://cdn7.bigcommerce.com/s-u0uja8gg4w/images/stencil/500x650/products/155/668/B000178_use__01779.1519163981.png?c=2"
          data-alt="genoderma lucidium"
        ></div>
      </div>
      <div class="col-lg-8">
        <p>Wellmedic je ekskluzivni uvoznik i distributer proizvoda Nanjing Xiyan Bio-Pharmaceutical Technology Co, Ltd za Evropu. <br/>Najpoznatiji proizvodi iz naše ponude su:</p>
        <ul class="list list--bullet">
          <li class="list--bullet_item">Meke gel kapsule na bazi ulja iz spora pečurke Ganoderma lucidum</li>
          <li class="list--bullet_item">Kapsule na bazi Ženšena i roga mladog jelena</li>
          <li class="list--bullet_item">Pasta za zube na bazi Zelenog propolisa i ulja Ganoderme lucidum</li>
        </ul>
        <p>Naša kuća WELLMEDIC d.o.o. Srbija u potpunosti posluje u skladu sa standardima ISO 9001:2008</p>
        <p>Wellmedic Ltd. Srbija je ekskluzivni uvoznik i distributer proizvoda Nanjing Xiyan Bio-Pharmaceutical Technology Co, Ltd proizvoda za Evropu.</p>
      </div>
    </div>
  </div>

  <div class="container section">
    <p class="primary text-center">Pozivamo potencijalne partnere da nas kontaktiraju za prodaju i distribuciju pominjanih proizvoda.<br/>Kontakt: <a href="mailto:office@wellmedic.rs">office@wellmedic.rs</a></p>
  </div>
@endSEction