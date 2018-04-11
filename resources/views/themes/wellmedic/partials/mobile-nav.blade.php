<aside class="drawer" id="mobileNav">
  <div class="drawer_drawer drawer_drawer--left">
    <div class="my-2">

      <div class="px-3 py-2 d-flex d-flex justify-content-between align-items-center">
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

      <div>
      <ul class="nav mobile-nav">
        @if(count($links)>0)
          @foreach($links as $link)
            @if($link->id == 2)
              <li class="nav-item accordion {{ Request::is('products') ? 'active' : '' }}">
                <div class="accordion_tab">
                  <a class="nav-link" href="{{ url($link->link) }}">{{ $link->title }}</a>
                  <button class="btn-icon toggler js-dropdown-toggle" data-target="#jsSubmenu" aria-controls="jsSubmenu" aria-expanded="false">
                    <svg class="icon">
                      <use xlink:href="#icon_arrow" />
                    </svg>
                  </button>
                </div>
                @php $subLinks = \App\MenuLink::where('parent', $link->id)->where('publish', 1)->orderBy('order', 'ASC')->get(); @endphp
                @if(count($subLinks)>0)
                <div class="accordion_pane" id="jsSubmenu">
                  <div class="accordion_container">
                    @foreach($subLinks as $subLink)
                      <div class="nav-item">
                        <a href="{{ url($subLink->link) }}" class="nav-link nav-link--secondary">{{ $subLink->title }}</a>
                      </div>
                    @endforeach
                  </div>
                </div>
                @endif
              </li>
            @else
              <li class="nav-item">
                <a class="nav-link" href="{{ url($link->link) }}">{{ $link->title }}</a>
              </li>
            @endif
          @endforeach
        @if(false)
        <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
          <a class="nav-link" href="/about">O nama</a>
        </li>
        <li class="nav-item accordion {{ Request::is('products') ? 'active' : '' }}">
          <div class="accordion_tab">
            <a class="nav-link" href="/products">Proizvodi</a>
            <button class="btn-icon toggler js-dropdown-toggle" data-target="#jsSubmenu" aria-controls="jsSubmenu" aria-expanded="false">
              <svg class="icon">
                <use xlink:href="#icon_arrow" />
              </svg>
            </button>
          </div>
          <div class="accordion_pane" id="jsSubmenu">
            <div class="accordion_container">
              <div class="nav-item">
                <a href="/products/id_1" class="nav-link nav-link--secondary">Genoderma lucidium</a>
              </div>
              <div class="nav-item">
                <a href="/products/id_2" class="nav-link nav-link--secondary">Jelenski rog</a>
              </div>
              <div class="nav-item">
                <a href="/products/id_3" class="nav-link nav-link--secondary">Pasta za zube</a>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item {{ Request::is('blog') ? 'active' : '' }}">
          <a class="nav-link" href="/blog">Blog</a>
        </li>
        <li class="nav-item {{ Request::is('experiences') ? 'active' : '' }}">
          <a class="nav-link" href="/experiences">Iskustva</a>
        </li>
        <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
          <a class="nav-link" href="/contact">Kontakt</a>
        </li>
          @endif
        @endif
      </ul>
      </div>

    </div>
  </div>
</aside>