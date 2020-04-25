@extends(layout())

@section('header', 'Reset Password')

@section('content')
  <div class="fusion-auth fusion-auth__reset">
    <div class="container">
      {!! Form::open(['url' => 'password/reset', 'class' => 'fusion-form fusion-form__reset', 'role' => 'form']) !!}
        <fieldset>
          <legend>Reset Your Password</legend>

          <input type="hidden" name="token" value="{{ $token }}">

          @include('fields.user.email', [ 'required' => true, 'value'=> $email or old('email'), 'placeholder' => 'Email', 'class' => false ])

          @include('fields.user.password', [ 'required' => true, 'placeholder' => 'Password', 'class' => false ])

          @include('fields.user.password_confirmation', [ 'required' => true, 'placeholder' => 'Confirm Password', 'class' => false ])

          <hr>

          @include('fields.default.submit', ['text' => 'Reset Password', 'class' => null])

        </fieldset>
      {!! Form::close() !!}
    </div>
  </div>
@endsection