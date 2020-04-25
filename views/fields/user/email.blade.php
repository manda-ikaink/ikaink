<div class="form-group {{ $class ? ' ' . $class : null }}{{ $required ? ' form-group--required' : null }}{{ $errors->has('email') ? ' has-error' : null }}">

  @include('fields.components.field-label', [ 'id' => 'fusion-email', 'label' => 'Email', 'required' => $required, 'class' =>  null])

  <input class="form-control" id="fusion-email" type="email" name="email" {!! isset($value) ? 'value="' . $value . '"' : null !!} {!! isset($placeholder) ? 'placeholder="' . $placeholder . '"' : null !!} {{ $required ? 'required' : null}}>

  @if ($errors->has('email'))
    @include('fields.components.field-error', [ 'id' => 'fusion-email', 'error' => $errors->first('email') ])
  @endif
</div>