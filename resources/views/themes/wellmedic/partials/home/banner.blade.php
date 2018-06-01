@if(!empty($banner))
<div class="container section">
    <div class="position-relative">
        <div id="banner-image"
                class="image image--banner mb-3 lazy-image"
                data-src="{{ url($banner->image) }}"
                style="background-image: url({{ Imagecache::get($banner->image, 'banner')->src }});"
        ></div>
        <div class="card banner" id="banner">
            <div class="card-body">
                <div class="headline banner_headline">{{ $banner->title }}</div>
                <div class="subheading banner_subheading">{{ $banner->subtitle }}</div>
            </div>
        </div>
    </div>
</div>
@endif