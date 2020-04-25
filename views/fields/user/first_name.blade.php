<div class="form-group {{ $class ? ' ' . $class : null }}{{ $required ? ' form-group--required' : null }}{{ $errors->has('email') ? ' has-error' : null }}">

  @include('fields.components.field-label', [ 'id' => 'fusion-first-name', 'label' => 'First Name', 'required' => $required, 'class' =>  null])

  <input class="form-control" id="fusion-first-name" type="text" name="first_name" {!! isset($value) ? 'value="' . $value . '"' : null !!} {!! isset($placeholder) ? 'placeholder="' . $placeholder . '"' : null !!} {{ $required ? 'required' : null}}>

  @if ($errors->has('first_name'))
    @include('fields.components.field-error', [ 'id' => 'fusion-first-name', 'error' => $errors->first('first_name') ])
  @endif
</div>