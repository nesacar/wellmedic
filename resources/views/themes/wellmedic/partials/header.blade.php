<header id="header">
  <div class="container header">
    <button class="btn-icon toggler toggler--menu js-menu-show" aria-controls="mobileNav" aria-expanded="false" aria-label="Otvori navigaciju">
      <svg class="icon" role="presentation">
        <use xlink:href="#icon_menu">
      </svg>
    </button>
    <a class="header_logo" href="/">
      <img src="{{ url('themes/wellmedic/images/wellmedic-logo.png') }}" alt="wellmedic logo">
    </a>

    <ul class="nav main-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/about">O nama</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="/proizvodi">Proizvodi</a>
        <button class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"></button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/proizvodi/id_1">Ganoderma lucidim</a>
          <a class="dropdown-item" href="/proizvodi/id_2">Jelenski rog</a>
          <a class="dropdown-item" href="/proizvodi/id_3">Pasta za zube</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/blog">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/iskustva">Iskustva</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/contact">Kontakt</a>
      </li>
    </ul>

    <div>
      <ul class="social d-none d-lg-inline-flex">
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
      <button class="btn-icon toggler">
        <svg class="icon" role="presentation">
          <use xlink:href="#icon_search">
        </svg>
      </button>
    </div>
  </div>
</header>