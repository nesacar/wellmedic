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
    <div id="map">
      <iframe
        class="map"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.2928502549926!2d20.4558135155359!3d44.81559827909875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7ab28ef7e779%3A0x708da2193230a5d0!2sObili%C4%87ev+venac+18%2C+Beograd!5e0!3m2!1sen!2srs!4v1523259440107"
        frameborder="0"
        style="border:0"
        title="prodavnice"
        allowfullscreen
      ></iframe>
    </div>
    <div class="row">
      <div class="col-lg-4 col-6">
        <div class="contact_column">
          <h3 class="subtitle">TC City Passage</h3>
          <div class="contact_cell">
            <div class="contact_icon">
              <svg class="icon">
                <use xlink:href="#icon_location">
              </svg>
            </div>
            <div>Obilićev Venac 18-20</div>
            <div>lokal 2.12</div>
          </div>
          <div class="contact_cell">
            <div class="contact_icon">
              <svg class="icon">
                <use xlink:href="#icon_time">
              </svg>
            </div>
            <b>Radno vreme</b>
            <div>Pon-Pet: 10:00-20:30</div>
            <div>Sub: 10:00-16:00</div>
          </div>
          <div class="contact_cell">
            <div class="contact_icon">
              <svg class="icon">
                <use xlink:href="#icon_mobile">
              </svg>
            </div>
            <b>Mobile</b>
            <div>+381 60 133 8227</div>
            <div>+381 61 285 5652</div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-6">
        <div class="contact_column">
          <h3 class="subtitle">TC Futura</h3>
          <div class="contact_cell">
            <div class="contact_icon">
              <svg class="icon">
                <use xlink:href="#icon_location">
              </svg>
            </div>
            <div>Nemanjina 40/ll</div>
            <div>lokal 3</div>
          </div>
          <div class="contact_cell">
            <div class="contact_icon">
              <svg class="icon">
                <use xlink:href="#icon_time">
              </svg>
            </div>
            <b>Radno vreme</b>
            <div>Pon-Pet: 10:00-17:00</div>
            <div>Sub: 10:00-16:00</div>
          </div>
          <div class="contact_cell">
            <div class="contact_icon">
              <svg class="icon">
                <use xlink:href="#icon_mobile">
              </svg>
            </div>
            <b>Mobile</b>
            <div>+381 60 033 8227</div>
            <div>+381 11 403 9778</div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="contact_column-spacer-fix"></div>
        <div class="row">
          <div class="col-lg-12 col-6">
            <div class="contact_column">
              <div class="contact_cell">
                <div class="contact_icon">
                  <svg class="icon">
                    <use xlink:href="#icon_fax">
                  </svg>
                </div>
                <b>Fax</b>
                <div>+381 11 403 9175</div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 col-6">
            <div class="contact_column">
              <div class="contact_cell">
                <div class="contact_icon">
                  <svg class="icon">
                    <use xlink:href="#icon_mail">
                  </svg>
                </div>
                <b>E-mail</b>
                <div><a href="mailto:info@wellmedic.rs">info@wellmedic.rs</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container section">
    <h2 class="title"><span class="thin">Kontaktirajte</span> nas</h2>
    <div class="contact_form">
      <form>

        <div class="text-field">
          <input class="text-field_input" type="text" name="name" id="name" />
          <label class="text-field_label" for="name">Ime i prezime</label>
          <div class="text-field_line"></div>
        </div>
        <div class="text-field">
          <input class="text-field_input" type="text" name="email" id="email" />
          <label class="text-field_label" for="email">Vaša e-mail adresa</label>
          <div class="text-field_line"></div>
        </div>
        <div class="text-field text-field--textarea">
          <textarea class="text-field_input" rows="8" name="message" id="message"></textarea>
          <label class="text-field_label" for="message">Poruka</label>
        </div>

        <div class="d-flex py-2">
          <button class="btn btn-primary ml-auto" type="submit">Pošalji</button>
        </div>
      </form>
    </div>
  </div>

@endsection