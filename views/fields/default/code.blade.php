<div class="form-group {{ $field->attributes['class'] ?? null }}{{ $field->validation['required'] ? ' form-group--required' : null }}{{ $class ? ' ' . $class : null }}{{ $errors->has($field->handle) ? ' has-error' : null }}">
  @php 
    $id = $field->handle . '_' . $field->id
  @endphp

  @include('fields.components.field-label', [ 'id' => $id, 'label' => $field->name, 'required' => $field->validation['required'], 'class' =>  null])

  <textarea class="highlight-syntax form-control" 
    name="{{ $field->handle }}"
    id="{{ $id }}"
    @if ($field->attributes['help'])
      aria-describedby="{{ $id . '_help' }}"
    @endif
    {{ $field->attributes['readonly'] ?? null }}
    {{ $field->validation['required'] ?? null }}>{{ old($field->handle, $value) }}</textarea>

  @if ($field->attributes['help'])
    @include('fields.components.field-help', [ 'id' => $id, 'help' => $field->attributes['help'], 'validate' => $validate ])
  @endif

  @if ($errors->has($field->handle))
    @include('fields.components.field-error', [ 'id' => $id, 'error' => $errors->first($field->handle) ])
  @endif
</div>

@if (! $field->attributes['readonly'])
  @push('head')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.40.2/codemirror.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.40.2/codemirror.min.js"></script>
  @endpush

  @push('scripts')
    <script>
      window.addEventListener('load', function(){
        var code   = document.getElementById('{{ $id }}');
        var editor = CodeMirror.fromTextArea(code, {
          lineNumbers : true
        });

        editor.on('change', function(cm, change) {
          code.value = cm.getValue();
        })
      }, false );
    </script>
  @endpush
@endif
