@if ($head)
@push('headScripts')
  @include('partials.script-manager.scripts',['scripts' => $head])
@endpush
@endif

@if ($top)
@push('topScripts')
  @include('partials.script-manager.scripts',['scripts' => $top])
@endpush
@endif

@if ($bottom)
@push('bottomScripts')
  @include('partials.script-manager.scripts',['scripts' => $bottom])
@endpush
@endif