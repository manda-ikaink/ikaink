<div class="form-group {{ $field->attributes['class'] ?? null }}{{ $field->validation['required'] ? ' form-group--required' : null }}{{ $class ? ' ' . $class : null }}{{ $errors->has($field->handle) ? ' has-error' : null }}">
  @php 
    $id = $field->handle . '_' . $field->id
  @endphp

  <div class="form-check">
    <input class="form-check-input"
      type="checkbox"
      name="{{ $field->handle }}[]"
      id="{{ $id }}"
      value="{{ $value }}"
      @if ($field->attributes['help'])
        aria-describedby="{{ $id . '_help' }}"
      @endif
      {{ $field->attributes['readonly'] ?? null }}
      {{ $field->attributes['disabled'] ?? null }}
      {{ $value ? 'checked' : '' }}>

    <label for="{{ $id }}">{{ $field->attributes['label'] }}</label>

    @if ($field->attributes['help'])
      @include('fields.components.field-help', [ 'id' => $id, 'help' => $field->attributes['help'], 'validate' => $validate ])
    @endif

    @if ($errors->has($field->handle))
      @include('fields.components.field-error', [ 'id' => $id, 'error' => $errors->first($field->handle) ])
    @endif
  </div>
</div>