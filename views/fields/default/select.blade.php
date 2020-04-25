@php
	$options = $field->attributes['options'];

	if (isset($value)) {
		foreach ($options as $key => $option) {
			$oldValue = old($field->handle, $value);

			$options[$key]['checked'] = (is_array($oldValue)
				? in_array($option['value'], $oldValue)
				: $option['value'] == $oldValue);
		}
	}
@endphp

<div class="form-group {{ $field->attributes['class'] ?? null }}{{ $field->validation['required'] ? ' form-group--required' : null }}{{ $class ? ' ' . $class : null }}{{ $errors->has($field->handle) ? ' has-error' : null }}">
	@php 
    $id = $field->handle . '_' . $field->id
  @endphp

	@include('fields.components.field-label', [ 'id' => $id, 'label' => $field->name, 'required' => $field->validation['required'], 'class' =>  null])

	<select class="form-control"
		name="{{ $field->handle }}{{ $field->attributes['multiple'] ? '[]' : null }}"
		id="{{ $id }}"
    @if ($field->attributes['help'])
      aria-describedby="{{ $id . '_help' }}"
    @endif
		{{ $field->attributes['readonly'] ?? null }}
		{{ $field->attributes['disabled'] ?? null }}
		{{ $field->attributes['multiple'] ?? null }}
		{{ $field->validation['required'] ?? null }}>
  	@if ($field->attributes['placeholder'])
  		<option value="">{{ $field->attributes['placeholder'] }}</option>
  	@endif

		@foreach ($options as $option)
			<option value="{{ $option['value'] }}" {{ ((isset($option['checked']) and $option['checked']) ? 'selected' : '') }}>
				{{ $option['label'] }}
			</option>
		@endforeach
	</select>

	@if ($field->attributes['help'])
    @include('fields.components.field-help', [ 'id' => $id, 'help' => $field->attributes['help'], 'validate' => $validate ])
  @endif

  @if ($errors->has($field->handle))
    @include('fields.components.field-error', [ 'id' => $id, 'error' => $errors->first($field->handle) ])
  @endif
</div>
