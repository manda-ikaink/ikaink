<div class="form-group {{ $class ? ' ' . $class : null }}{{ $required ? ' form-group--required' : null }}{{ $errors->has('email') ? ' has-error' : null }}">

  @include('fields.components.field-label', [ 'id' => 'fusion-password', 'label' => 'Password', 'required' => $required, 'class' =>  null])

  <input class="form-control" id="fusion-password" type="password" name="password" {!! isset($value) ? 'value="' . $value . '"' : null !!} {!! isset($placeholder) ? 'placeholder="' . $placeholder . '"' : null !!}  {{ $required ? 'required' : null}}>

  @if ($errors->has('password'))
  	@include('fields.components.field-error', [ 'id' => 'fusion-password', 'error' => $errors->first('password_confirmation') ])
  @endif
</div>