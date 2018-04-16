@if(count($products)>0)
<div class="container section">
    <div class="row">
        @foreach ($products as $product)
            <div class="col-lg-4 card-container">
                <div class="card product-card with-shadow">
                    <a class="link product-card_link" href="{{ url('proizvodi/'.$product->slug.'/'.$product->id) }}">
                        <div class="card-body product-card_body">
                            <div class="product-card_thumbnail">
                                <div class="image image--thumbnail fit-height lazy-image"
                                     data-src="{{ $product->image }}"
                                     data-alt="{{ $product->title }}"
                                >
                                </div>
                            </div>
                            <div class="product-card_description">
                                <span class="caption">{{ $product->subtitle}}</span>
                                <h3 class="subheading">{{ $product->title}}</h3>
                                <p class="product-card_info">{{ $product->short}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif