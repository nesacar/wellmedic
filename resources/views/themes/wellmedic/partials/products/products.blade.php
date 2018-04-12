@if(count($products)>0)
<div class="section">
    @foreach ($products as $i => $product)
        @php $isOdd = (($i % 2) == 0); @endphp
        <div class="product {{ $isOdd ? '' : 'product--alt paper-rip' }}">
            <div class="container product_container">
                <div class="row {{ $isOdd ? 'flex-row-reverse' : '' }}">
                    <div class="col-md-5">
                        <div class="image image--square fit-height mb-3 lazy-image" data-src="{{ url($product->image) }}"
                             style="background-image: url({{ Imagecache::get($product->image, 'square')->src }});"
                        ></div>
                    </div>
                    <div class="col-md-7 product_desc">
                        <div class="py-4">
                            <p class="caption caption--big">{{ $product->overTitle}}</p>
                            <h2 class="headline">{{ $product->title }}</h2>
                            <p class="tag-line">{{ $product->subTitle }}</p>
                            <p>{{ $product->short }}</p>
                            <div class="action-footer">
                                <a class="btn btn-primary" href="{{ url('proizvodi/'.$product->slug.'/'.$product->id) }}">Saznajte više</a>
                                <a href="{{ url('iskustva/'.$product->slug.'/'.$product->id) }}" title="iskustva" class="action-footer_comments">
                                    <svg class="icon" role="presentation">
                                        <use xlink:href="#icon_comment" />
                                    </svg>
                                    <span class="action-footer_comments_desc product_comments-desc">Iskustva naših korisnika</span>{{ $product->count }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endif