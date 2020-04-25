<div class="form-group {{ $class ? ' ' . $class : null }}{{ $required ? ' form-group--required' : null }}{{ $errors->has('email') ? ' has-error' : null }}">

  @include('fields.components.field-label', [ 'id' => 'fusion-last-name', 'label' => 'Last Name', 'required' => $required, 'class' =>  null])

  <input class="form-control" id="fusion-last-name" type="text" name="last_name" {!! isset($value) ? 'value="' . $value . '"' : null !!} {!! isset($placeholder) ? 'placeholder="' . $placeholder . '"' : null !!} {{ $required ? 'required' : null}}>

  @if ($errors->has('last_name'))
    @include('fields.components.field-error', [ 'id' => 'fusion-last-name', 'error' => $errors->first('last_name') ])
  @endif
</div>