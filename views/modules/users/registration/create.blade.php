@extends(layout())

@section('header', 'Register')

@section('content')
  @php
    $role = role()->where('id',(setting('user_default_role') ?? '2'))->first()
  @endphp

  <div class="fusion-register">
    <div class="container">
      {!! Form::open(['class' => 'fusion-form fusion-form__register', 'role' => 'form']) !!}
        <fieldset>
          <legend>Register</legend>

          <p class="fusion-form__register-desc">Please fill out the form below to register an account!</p>

          @include('fields.user.email', [ 'required' => true, 'placeholder' => 'Email', 'class' => false ])

          @include('fields.user.first_name', [ 'required' => true, 'placeholder' => 'First Name', 'class' => false ])

          @include('fields.user.last_name', [ 'required' => false, 'placeholder' => 'Last Name', 'class' => false ])

          @foreach($role->fields as $field)
            @if (isset($field->validation['required']))
              @if ($field->validation['required'])
                @include('fields.default.' . $field->type, ['field' => $field, 'value' => null, 'class' => false])
              @endif
            @endif
          @endforeach

          @include('fields.user.password', [ 'required' => true, 'placeholder' => 'Password', 'class' => false ])

          @include('fields.user.password_confirmation', [ 'required' => true, 'placeholder' => 'Confirm Password', 'class' => false ])

          @include('fields.default.submit', ['text' => 'Register', 'class' => null])

          <p class="help-block help-block__links">
            <a href="{{ route('users.login') }}">I already have an account</a>
          </p>
        </fieldset>
      {!! Form::close() !!}
    </div>
  </div>
@endsection