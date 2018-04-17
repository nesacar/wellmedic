<div data-href="{{ $data_href ?: '#' }}" class="quote">
  <div class="quote_icon">
    <svg class="icon" role="presentation">
      <use xlink:href="#icon_quote">
    </svg>
  </div>
  <div class="quote_info">
    <p class="quote_text with-trunk">
    <em>{{ $body }}</em>
    </p>
    <p class="quote_author">@if($href) <a href="{{ $href }}" target="_blank" rel="noreferrer noopener">{{ $author }}</a> @else {{ $author }} @endif</p>
  </div>
</div>