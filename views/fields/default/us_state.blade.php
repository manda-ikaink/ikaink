@php
	$fieldtype = fieldtypes()->get($field->type);
	$options   = $fieldtype->getData('states');

	foreach ($options as $code => $state) {
		$oldValue = old($field->handle, $value);

		$options[$code] = [
			'name'  => $state,
			'checked' => isset($oldValue) ? ($code == $oldValue) : false
		];
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
  	@else
  		@if ($field->attributes['multiple'])
				<option value="">Please select one or more states...</option>
			@else
				<option value="">Please select a state...</option>
			@endif
  	@endif

		@foreach ($options as $code => $state)
			<option value="{{ $code }}" {{ ($state['checked'] ? 'selected' : '') }}>{{ $state['name'] }}</option>
		@endforeach
	</select>

	@if ($field->attributes['help'])
    @include('fields.components.field-help', [ 'id' => $id, 'help' => $field->attributes['help'], 'validate' => $validate ])
  @endif

  @if ($errors->has($field->handle))
    @include('fields.components.field-error', [ 'id' => $id, 'error' => $errors->first($field->handle) ])
  @endif
</div>
