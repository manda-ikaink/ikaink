<div class="page-banner">
  <div class="page-banner__container container text-center">
      <h1 class="hero-title mb-3">{{ $entry->display_name ? $entry->display_name : $entry->name }}</h1>
      @if ($subtitle)<p class="hero-subtitle mb-0">{{ $subtitle }}</p>@endif
  </div>
  
  @if ($breadcrumb)
    {{-- Breadcrumb --}}
    @include('partials.navigation.breadcrumbs')
  @endif
</div>
