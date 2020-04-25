@php
	$options = $field->attributes['options'];

	if (isset($value)) {
		foreach ($options as $key => $option) {
			$oldValue = old($field->handle, $value);

			$options[$key]['checked'] = (
				is_array($oldValue)
					? in_array($option['value'], $oldValue)
					: $option['value'] == $oldValue);
		}
	}
@endphp

<div class="form-group checkbox-group {{ $field->attributes['class'] ?? null }}{{ $field->validation['required'] ? ' form-group--required' : null }}{{ $class ? ' ' . $class : null }}{{ $errors->has($field->handle) ? ' has-error' : null }}">

	@include('fields.components.field-label', [ 'id' => $field->handle . '_' . $field->id, 'label' => $field->name, 'required' => $field->validation['required'], 'class' =>  null ])

	<div>
		@foreach ($options as $option)
			@php
				$id = $field->handle . '_' . $field->id . '_' . $loop->iteration
			@endphp

			<div class="form-check">
				<input class="form-check-input"
					type="checkbox"
					name="{{ $field->handle }}[]"
					id="{{ $id }}"
					value="{{ $option['value'] }}"
					@if ($field->attributes['help'])
						aria-describedby="{{ $id . '_help' }}"
					@endif
					{{ $field->attributes['readonly'] ?? null }}
					{{ $field->attributes['disabled'] ?? null }}
					{{ $field->validation['required'] ?? null }}
					{{ ((isset($option['checked']) and $option['checked']) ? 'checked' : '') }}>

				<label class="form-check-label" for="{{ $id }}">{{ $option['label'] }}</label>

				@if($loop->last)
					@if ($field->attributes['help'])
						@include('fields.components.field-help', [ 'id' => $id, 'help' => $field->attributes['help'], 'validate' => $validate ])
					@endif

					@if ($errors->has($field->handle))
						@include('fields.components.field-error', [ 'id' => $id, 'error' => $errors->first($field->handle) ])
					@endif
				@endif
			</div>
		@endforeach
	</div>
</div>
