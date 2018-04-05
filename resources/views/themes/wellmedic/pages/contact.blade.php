@extends('themes.wellmedic.index')
@section('title')
  {{ $title }}
@endsection
@section('content')
  <div class="section position-relative">
    <div class="hero" id="hero">
      <h1 class="title hero_title">Kontakt</h1>
      <figure class="plant plant--spoon">
        <img src="{{ url('themes/wellmedic/images/demo/spoon.png') }}" alt="drvena kašika">
      </figure>
    </div>
    <div id="breadcrumb">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Početna</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kontakt</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div class="container section">
    <h2 class="title"><span class="thin">Pronađite</span> nas</h2>
    <div>mapa</div>
    <div>Kontakt info</div>
  </div>
  
  <div class="container section">
    <h2 class="title"><span class="thin">Kontaktirajte</span> nas</h2>
    <form>

      <div class="text-field">
        <input class="text-field_input" type="text" name="name" id="name" />
        <label class="text-field_label" for="name">Ime i prezime</label>
        <div class="text-field_line"></div>
      </div>

    </form>
  </div>

@endsection