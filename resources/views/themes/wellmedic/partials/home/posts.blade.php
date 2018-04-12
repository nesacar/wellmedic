@if(count($posts)>2)
<div class="container section">
    <h2 class="title"><span class="thin">Naš</span> blog</h2>

    <div class="row">
        <div class="col-lg-7">
            <div class="article-entry">
                <div
                        class="image mb-3 lazy-image"
                        data-src="{{ url($posts[0]->image) }}"
                        style="background-image: url({{ Imagecache::get($posts[0]->image, 'image')->src }});"
                ></div>
                <div class="caption">{{ \Carbon\Carbon::parse($posts[0]->publish_at)->format('d. M Y.') }}</div>
                <h3 class="subheading">{{ $posts[0]->title }}</h3>
                <p>{{ $posts[0]->short }}</p>
                <a href="{{ url('blog/'.$posts[0]->slug.'/'.$posts[0]->id) }}" class="btn btn-outline-primary">Pročitaj više</a>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="article-entry">
                <div
                        class="image image--alt mb-3 lazy-image"
                        data-src="{{ url($posts[1]->image) }}"
                        style="background-image: url({{ Imagecache::get($posts[1]->image, 'alt')->src }});"
                ></div>
                <div class="caption">{{ \Carbon\Carbon::parse($posts[1]->publish_at)->format('d. M Y.') }}</div>
                <div class="action-footer">
                    <h3 class="subheading">{{ $posts[1]->title }}</h3>
                    <a href="{{ url('blog/'.$posts[0]->slug.'/'.$posts[0]->id) }}" class="btn btn-outline-primary">Pročitaj više</a>
                </div>
            </div>
            <div class="article-entry">
                <div
                        class="image image--alt mb-3 lazy-image"
                        data-src="{{ url($posts[2]->image) }}"
                        style="background-image: url({{ Imagecache::get($posts[2]->image, 'alt')->src }});"
                ></div>
                <div class="caption">{{ \Carbon\Carbon::parse($posts[2]->publish_at)->format('d. M Y.') }}</div>
                <div class="action-footer">
                    <h3 class="subheading">{{ $posts[2]->title }}</h3>
                    <a href="{{ url('blog/'.$posts[0]->slug.'/'.$posts[0]->id) }}" class="btn btn-outline-primary">Pročitaj više</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif