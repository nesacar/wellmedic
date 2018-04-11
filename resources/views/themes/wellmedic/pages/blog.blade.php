@extends('themes.'.$theme.'.index')

@section('title')
  Blog
@endsection

@section('content')
  <div class="section position-relative">
    <div class="hero" id="hero">
      <h1 class="title hero_title">Blog</h1>
      <figure class="plant plant--spoon">
        <img src="{{ url('themes/wellmedic/images/demo/spoon.png') }}" alt="drvena kašika">
      </figure>
    </div>
    <div id="breadcrumb">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Početna</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div class="section container">
    <div class="row">
      @if(count($posts)>0)
        @foreach($posts as $i => $post)
          <div class="mb-3 {{ ($i < 2) ? 'col-lg-6' : 'col-lg-4' }}">
              @component('themes.'.$theme.'.components.article-entry', [
                'imageLg' => url($post->image),
                'imageSm' => url(Imagecache::get($post->image, 'square')->src),
                'date' => \Carbon\Carbon::parse($post->publish_at)->format('d. M Y.'),
                'title' => $post->title,
                'body' => $post->body,
                'articleURL'=> url('blog/'.$post->slug.'/'.$post->id),
                'commentsURL'=> url('iskustva/'.$post->product_slug.'/'.$post->product_id),
                'count'=> $post->count
              ])
              @endcomponent
          </div>
        @endforeach
      @endif
    </div>
  </div>

  <div class="container section" id="pagination">
    <nav aria-label="paginacija">
      {{ $posts->links() }}
    </nav>
  </div>
@endsection