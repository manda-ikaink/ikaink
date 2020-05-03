<div class="page-banner">
    <div class="page-banner__container container text-{{ $align ?? 'center' }}">
        <h1 class="hero-title mb-3">{{ $heading }}</h1>
        @if ($subtitle)<p class="hero-subtitle">{{ $subtitle }}</p>@endif

        {{$slot}}
    </div>

    @if ($breadcrumb)
    @include('partials.navigation.breadcrumbs')
    @endif
</div>
  