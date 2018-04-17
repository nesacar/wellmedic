@extends('themes.'.$theme.'.index')

@section('title')
  Wellmedic - Blog
@endsection

@section('seo_social_stuff')
  <meta name="description" content="{!! $settings->desc !!}" />
  <meta name="keywords" content="{{ $settings->keywords }}" />
  <meta name="author" content="Mini STUDIO Publishing Group">

  <!-- Facebok Open Graph -->
  <meta property="og:title" content="Wellmedic - Blog"/>
  <meta property="og:image" content="{{ url('themes/'.$theme.'/img/wellmedic-social-share.jpg') }}"/>
  <meta property="og:type" content="article"/>
  <meta property="og:url" content="{{ url('blog') }}"/>
  <meta property="og:site_name" content="{{ $settings->title }}"/>
  <meta property="og:description" content="{!! $settings->desc !!}" />
  <!-- Facebok Open Graph Kraj-->

  <!-- ITEM za GOOGLE + -->
  <meta itemprop="name" content="Wellmedic - Blog" />
  <meta itemprop="description" content="{!! $settings->desc !!}" />
  <meta itemprop="image" content="{{ url('themes/'.$theme.'/img/wellmedic-social-share.jpg') }}" />
  <!-- ITEM za GOOGLE + END -->

  <!-- ITEM Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@wellmedic">
  <meta name="twitter:creator" content="@wellmedic">
  <meta name="twitter:title" content="Wellmedic - Blog">
  <meta name="twitter:description" content="{!! $settings->desc !!}">
  <meta name="twitter:image" content="{{ url('themes/'.$theme.'/img/wellmedic-social-share.jpg') }}">
  <!-- ITEM Twitter END -->
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
        @foreach($posts as $i => $p)
          <div class="mb-5 {{ ($i < 2) ? 'col-lg-6' : 'col-lg-4' }}">
              @component('themes.'.$theme.'.components.article-entry', [
                'imageLg' => url($p->image),
                'imageSm' => url(Imagecache::get($p->image, 'square')->src),
                'date' => \Carbon\Carbon::parse($p->publish_at)->format('d. M Y.'),
                'title' => $p->title,
                'body' => $p->body,
                'articleURL'=> url('blog/'.$p->slug.'/'.$p->id),
                'commentsURL'=> url('iskustva/'.$post->product_slug.'/'.$p->product_id),
                'count'=> $p->count
              ])
              @endcomponent
          </div>
        @endforeach
      @endif
    </div>

    <div id="pagination">
      <nav aria-label="paginacija">
        {{ $posts->links() }}
      </nav>
    </div>
    
  </div>
@endsection