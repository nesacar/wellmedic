@if(count($posts)>0)
<div class="container section">
    <h2 class="title"><span class="thin">Naš</span> blog</h2>
    <div class="row">
        @foreach($posts as $post)
            <div class="col-lg-4">
                @component('themes.'.$theme.'.components.article-entry', [
                  'imageLg' => url($post->image),
                  'imageSm' => url(Imagecache::get($post->image, 'image')->src),
                  'date' => \Carbon\Carbon::parse($post->publish_at)->format('d. M Y.'),
                  'title' => $post->title,
                  'body' => $post->short,
                  'articleURL'=> url('blog/'.$post->slug.'/'.$post->id),
                  'commentsURL'=> url('iskustva/'.$post->product_slug.'/'.$post->product_id),
                  'count'=> $post->count
                ])
                @endcomponent
            </div>
        @endforeach
    </div>
</div>
@endif