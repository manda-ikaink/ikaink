@if ($scripts)
@unless ($scripts->isEmpty())
  @foreach ($scripts as $script)
    {!! $script->code !!}
  @endforeach
@endunless
@endif