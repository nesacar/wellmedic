<footer id="footer">
  <div id="footer-plants">
    <figure class="plant plant--mushroom">
      <img src="{{ url('themes/wellmedic/images/demo/mushroom.png') }}" alt="drvena kašika">
    </figure>
    <figure class="plant plant--powder">
      <img src="{{ url('themes/wellmedic/images/demo/powder.png') }}" alt="drvena kašika">
    </figure>
  </div>
  <div class="footer">
    <div class="newsletter">
      <div class="container">
        <h3 class="subheading newsletter_title">Prijavite se za naš Newsletter</h3>
        <p class="primary">Najnovije vesti i specijalne ponude u vašem e-mail sandučetu.</p>
        <div class="d-flex justify-content-center py-3">
          <form class="newsletter_form" method="POST" action="{{ action('PagesController@subscribe') }}">
            @csrf
            <input type="text" class="form-control newsletter_input" placeholder="Vaš e-mail" aria-label="vaša e-mail adresa">
            <button class="btn btn-primary newsletter_btn" type="submit">Prijavi se</button>
          </form>
        </div>
      </div>
    </div>
    <div class="container separator"></div>
    <div class="container pt-4">
      <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-12 footer-column-offset-fix">
          <div class="footer_company">
            <img src="{{ url('themes/wellmedic/images/wellmedic-logo.png') }}" alt="wellmedic logo">
            <p>{!! $settings->footer !!}</p>
          </div>
        </div>
        <div class="col-xl-5 col-lg-6">
          <h5 class="section-title">Pronađite nas</h5>
          <div class="row">
            <div class="col-6 contact_column">
              <div class="contact_cell">
                <div class="contact_icon">
                  <svg class="icon">
                    <use xlink:href="#icon_location">
                  </svg>
                </div>
                <strong>TC City Passage</strong>
                <div>Obilićev Venac 18-20, lokal 2.12</div>
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
            </div>
            <div class="col-6 contact_column">
              <div class="contact_cell">
                <div class="contact_icon">
                  <svg class="icon">
                    <use xlink:href="#icon_location">
                  </svg>
                </div>
                <strong>TC Futura</strong>
                <div>Nemanjina 40/ll, lokal 3</div>
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
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6">
          <h5 class="section-title">Kontakt</h5>
          <div class="row">
            <div class="col-6 contact_column">
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
              <div class="contact_cell">
                <div>+381 60 033 8227</div>
                <div>+381 11 403 9778</div>
              </div>
            </div>
            <div class="col-6 contact_column">
              <div class="contact_cell">
                <div class="contact_icon">
                  <svg class="icon">
                    <use xlink:href="#icon_fax">
                  </svg>
                </div>
                <b>Fax</b>
                <div>+381 11 403 9175</div>
              </div>
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
  <div class="subfooter">
    <div class="container subfooter_copy">
      <span>Copyright &copy; {{ date("Y") }} Wellmedic | All rights reserved.</span>
      <span>Developed by <a href="https://ministudio.rs/" target="_blank" rel="noopener noreferrer">Mini STUDIO Publishing Group</a></span>
    </div>
  </div>
</footer>