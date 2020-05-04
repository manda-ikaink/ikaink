<div class="page-banner {{ $video ? 'page-banner--has-video jarallax' : null }}" @if ($video) data-jarallax-video="{{ $video }}"@endif>
    <div class="page-banner__container container text-{{ $align ?? 'center' }}">
        <h1 class="hero-title mb-3">{{ $heading }}</h1>
        @if ($subtitle)<p class="hero-subtitle">{{ $subtitle }}</p>@endif

        {{$slot}}
    </div>

    <div class="d-flex align-items-center justify-content-center">
        @if ($breadcrumb)
        @include('partials.navigation.breadcrumbs')
        @endif
    </div>

    @if ($video)<a class="page-banner__video-link" href="{{ $video }}" title="View full header video in new window" rel="noopener noreferrer" target="_blank"><span class="sr-only">Full Video</span> <span class="fas fa-play-circle" aria-hidden="true"></span></a>@endif
</div>
  