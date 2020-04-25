{{-- Override default SEO meta information --}}

@if ($meta)
  @if($meta->seo && $meta->seo->title)
    @php
      seo()->setTitle($meta->seo->title)
    @endphp
  @endif

  @if($meta->seo && $meta->seo->description)
    @php
      seo()->setDescription($meta->seo->description)
    @endphp
  @endif

  @if($meta->seo && $meta->seo->keywords)
    @php
      seo()->setKeywords($meta->seo->keywords)
    @endphp
  @endif
@endif