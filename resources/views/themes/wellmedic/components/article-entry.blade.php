<div class="article-entry">
  <div
    class="image mb-3 lazy-image"
    data-src="{{ $imageLg }}"
    style="background-image: url({{ $imageSm }});"
  ></div>
  <div class="caption">{{ $date }}</div>
  <h3 class="subheading">{{ $title }}</h3>
  <p class="article-entry_text with-trunk">{{ $body }}</p>
  <div class="article-entry_footer">
    <a href="{{ $articleURL }}" class="btn btn-outline-primary">Pročitaj više</a>
    <a href="{{ $commentsURL }}" title="iskustva" class="article-entry_comments">
      <svg class="icon" role="presentation">
        <use xlink:href="#icon_comment" />
      </svg>
      <span class="article-entry_comments_desc">Iskustva naših korisnika</span>{{ $count }}
    </a>
  </div>
</div>