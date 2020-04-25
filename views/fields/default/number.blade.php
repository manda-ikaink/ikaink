<div class="form-group {{ $field->attributes['class'] ?? null }}{{ $field->validation['required'] ? ' form-group--required' : null }}{{ $class ? ' ' . $class : null }}{{ $errors->has($field->handle) ? ' has-error' : null }}">
  @php 
    $id = $field->handle . '_' . $field->id
  @endphp

  @include('fields.components.field-label', [ 'id' => $id, 'label' => $field->name, 'required' => $field->validation['required'], 'class' =>  null])

  <input class="form-control"
    type="number"
    name="{{ $field->handle }}"
    id="{{ $id }}"
    value="{{ old($field->handle, $value) }}"
    step="{{ $field->attributes['decimal'] ? $field->attributes['decimal'] : '1' }}"
    @if ($field->attributes['placeholder'])
      placeholder="{{ $field->attributes['placeholder'] }}"
    @endif
    @if ($field->attributes['help'])
      aria-describedby="{{ $id . '_help' }}"
    @endif
    {{ $field->attributes['readonly'] ?? null }}
    {{ $field->attributes['disabled'] ?? null }}
    {{ $field->validation['required'] ?? null }}>

  @if ($field->attributes['help'])
    @include('fields.components.field-help', [ 'id' => $id, 'help' => $field->attributes['help'], 'validate' => $validate ])
  @endif

  @if ($errors->has($field->handle))
    @include('fields.components.field-error', [ 'id' => $id, 'error' => $errors->first($field->handle) ])
  @endif
</div>
