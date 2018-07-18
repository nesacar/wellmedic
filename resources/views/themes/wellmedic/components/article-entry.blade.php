<div class="article-entry">
  <div
    class="image mb-3 lazy-image"
    data-src="{{ $imageLg }}"
    style="background-image: url({{ $imageSm }});"
  ></div>
  <div class="caption">{{ $date }}</div>
  <h3 class="subheading">{{ $title }}</h3>
  <p class="article-entry_text with-trunk">{{ $body }}</p>
  <div class="action-footer">
    <a href="{{ $articleURL }}" class="btn btn-outline-primary">Pročitaj više</a>
    @if($count > 0)
      <a href="{{ $commentsURL }}" title="iskustva" class="action-footer_comments">
        <svg class="icon" role="presentation">
          <use xlink:href="#icon_comment" />
        </svg>
        <span class="action-footer_comments_desc article-entry_comments-desc">Iskustva naših korisnika</span>{{ $count }}
      </a>
    @endif
  </div>
</div>