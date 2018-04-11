@if(count($testimonials)>0)
<div class="container section">
    <h2 class="title">
        <span class="thin">Iskustva</span> korisnika</h2>
    <div class="carousel carousel--quotes">
        <div class="swiper-container is-loading" data-name="quotes">
            <div class="swiper-wrapper">

                @foreach($testimonials as $testimonial)
                    <div class="swiper-slide">
                        @component('themes.'.$theme.'.components.quote', [
                          'body' => $testimonial->body,
                          'author' => $testimonial->author,
                          'href' => url('iskustva/'.$testimonial->slug.'/'.$testimonial->id)
                        ])
                        @endcomponent
                    </div>
                @endforeach

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
@endif