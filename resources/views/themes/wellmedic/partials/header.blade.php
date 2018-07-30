<header id="header">
  <div class="container header">
    <button class="btn-icon toggler toggler--menu js-menu-show" aria-controls="mobileNav" aria-expanded="false" aria-label="Otvori navigaciju">
      <svg class="icon" role="presentation">
        <use xlink:href="#icon_menu">
      </svg>
    </button>
    <a class="header_logo" href="{{ url('/') }}">
      <img src="{{ url('themes/wellmedic/images/wellmedic-logo.png') }}" alt="wellmedic logo">
    </a>

    @if(count($links)>0)
    <ul class="nav main-nav">
      @foreach($links as $link)
        @if($link->id == 2)
          <li class="nav-item dropdown {{ Request::is($link->link) ? 'active' : '' }}">
            <a class="nav-link" href="{{ url($link->link) }}">{{ $link->title }}</a>
            @php $subLinks = \App\MenuLink::where('parent', $link->id)->where('publish', 1)->orderBy('order', 'ASC')->get(); @endphp
            @if(count($subLinks)>0)
            <div class="dropdown-menu">
              @foreach($subLinks as $subLink)
                <a class="dropdown-item nav-link--secondary" href="{{ url($subLink->link) }}">{{ $subLink->title }}</a>
              @endforeach
            </div>
            @endif
          </li>
        @else
          <li class="nav-item {{ Request::is($link->link) ? 'active' : '' }}">
            <a class="nav-link" href="{{ url($link->link) }}">{{ $link->title }}</a>
          </li>
        @endif

      @endforeach
    </ul>
    @endif

    <div>
      <ul class="social social--desktop">
        @if(!empty($settings->facebook))
        <li class="social_item">
          <a href="{{ $settings->facebook }}" target="_blank" rel="noopener noreferrer" aria-label="pratite nas na facebooku">
            <svg class="icon" role="presentation">
              <use xlink:href="#icon_facebook">
            </svg>
          </a>
        </li>
        @endif
        @if(!empty($settings->instagram))
        <li class="social_item">
          <a href="{{ $settings->instagram }}" target="_blank" rel="noopener noreferrer" aria-label="pratite nas na instagramu">
            <svg class="icon" role="presentation">
              <use xlink:href="#icon_instagram">
            </svg>
          </a>
        </li>
        @endif
        @if(!empty($settings->twitter))
        <li class="social_item">
          <a href="{{ $settings->twitter }}" target="_blank" rel="noopener noreferrer" aria-label="pratite nas na twitteru">
            <svg class="icon" role="presentation">
              <use xlink:href="#icon_twitter">
            </svg>
          </a>
        </li>
          @endif
      </ul>
      <form id="search-form">
        <div class="search-widget">
          <button class="btn-icon toggler search-widget_search-btn" aria-label="pretraži" type="submit">
            <svg class="icon" role="presentation">
              <use xlink:href="#icon_search">
            </svg>
          </button>
          <label for="search-input" class="sr-only">Pretraži</label>
          <input type="text" id="search-input" placeholder="Pretraži" />
          <div class="search-widget_border"></div>
          <button class="btn-icon toggler search-widget_close-btn" aria-label="poništi" type="reset">
            <svg class="icon" role="presentation">
              <use xlink:href="#icon_close">
            </svg>
          </button>
        </div>
      </form>
    </div>
  </div>
</header>