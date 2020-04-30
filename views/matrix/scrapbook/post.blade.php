@extends(layout())

@php
    if ($entry->categories) {
        $mainCategory = $entry->categories->where('parent_id',0)->first();
    }
@endphp

{{-- Template Settings --}}
@section('page-id', 'scrapbook')
@section('main-class', 'd-flex align-items-stretch')

{{-- Set Open Graph Data --}}
@component('components.social-media.tags', [
  'image' => isset($entry->share_image->slug) ? $entry->share_image->path() : null,
  'title' => $entry->share_title ?? null,
  'desc'  => $entry->share_description ?? null,
  'type'  => 'article'
  ])
  <meta property="article:published_time" content="{{ $entry->publish_at }}" />
  <meta property="article:modified_time" content="{{ $entry->updated_at }}" />
  @if ($entry->expire_at)
  <meta property="article:expiration_time" content="{{ $entry->expire_at }}" />
  @endif
  @if ($mainCategory)
    <meta property="article:section" content="{{ $mainCategory->name }}" />
  @endif
  @if ($entry->categories)
  @foreach ($entry->categories as $tag)
  <meta property="article:tag" content="{{$tag->name}}" />
  @endforeach
  @endif
@endcomponent



{{-- Template Content --}}
@section('banner')
<div class="post-header">
    <div class="post-header__container container text-center">
        <h1 class="mb-3">{{ $entry->display_name ? $entry->display_name : $entry->name }}</h1>

        <p class="mb-0">
            Posted on {{ date_format($entry->publish_at, 'M d, Y') }} | 
            @if ($entry->categories->count())
            <span class="fas fa-tag fa-fw"></span>
            @foreach($entry->categories as $postcat)
                <a href="{{ url($postcat->path()) }}">{{ $postcat->name }}</a>@unless($loop->last), @endunless
            @endforeach
            @endif
        </p>
    </div>
    
    {{-- Breadcrumb --}}
    @include('partials.navigation.breadcrumbs')
</div>
@endsection

@section('content')
<div class="post-content">
    @if ($entry->headline)
    <div class="container mb-5">
        <p class="text-display--xs mb-0">{{ $entry->headline }}</p>
        <hr>
    </div>
    @endif

    @unless ($entry->content->isEmpty())
    @foreach ($entry->content as $section)
        @php $sectionSet = $section['set']; @endphp
        @includeIf('components.page.' . $sectionSet['handle'], ['component' => $section['data']])
    @endforeach
    @endunless

    <section class="container mb-5">
        <hr>
        <h3 class="text-display--xxs"><a class="text-display--default" href="{{ url($entry->uri) }}#disqus_thread">Comment</a></h3>
        <div id="disqus_thread"></div>
    </section>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</div>
@endsection

@push('bottomScripts')
<script id="dsq-count-scr" src="//ika-ink.disqus.com/count.js" async></script>
<script>
var disqus_config = function () {
    this.page.url = '{{ url($entry->uri) }}';
    this.page.identifier = 'scrapbook-post-{{ $entry->id }}';
    this.page.title = '{{ $entry->display_name ? $entry->display_name : $entry->name }}';
};
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://ika-ink.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
@endpush