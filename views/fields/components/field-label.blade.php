<label for="{{ $id }}" class="{{ $class ?? null }}">
  {{ $label }}
  @if ($required)
    <span>*</span>
  @endif
</label>