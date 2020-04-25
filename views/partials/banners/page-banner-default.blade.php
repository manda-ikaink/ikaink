<div class="page-banner lazy" data-src="{{ $background ? $background : theme(theme_property('settings.images.page-banner')) }}">
  <div class="container position-relative text-center text-lg-left">
    @if ($heading)<h1 class="page-banner__title">{{ $heading }}</h1>@endif

    @if ($subtitle)<p class="page-banner__subtitle mb-0">{{ $subtitle }}</p>@endif
  </div>

  <picture>
    <source  src="{{ theme(theme_property('settings.images.loading')) }}" data-srcset="{{ $background ? $background : theme(theme_property('settings.images.page-banner')) }}?w=600&amp;fit=max" media="--xs" />
    <source  src="{{ theme(theme_property('settings.images.loading')) }}" data-srcset="{{ $background ? $background : theme(theme_property('settings.images.page-banner')) }}?w=800&amp;fit=max" media="--sm" />
    <source  src="{{ theme(theme_property('settings.images.loading')) }}" data-srcset="{{ $background ? $background : theme(theme_property('settings.images.page-banner')) }}?w=1200&amp;fit=max" media="--md" />
    <source  src="{{ theme(theme_property('settings.images.loading')) }}" data-srcset="{{ $background ? $background : theme(theme_property('settings.images.page-banner')) }}?w=1400&amp;fit=max" media="--lg" />
    <source  src="{{ theme(theme_property('settings.images.loading')) }}" data-srcset="{{ $background ? $background : theme(theme_property('settings.images.page-banner')) }}?w=1600&amp;fit=max" media="--xl"/>
    <img class="lazy page-banner__img" src="{{ theme(theme_property('settings.images.loading')) }}" data-src="{{ $background ? $background : theme(theme_property('settings.images.page-banner')) }}?w=1800&amp;fit=max" alt="" />
  </picture>
</div>
