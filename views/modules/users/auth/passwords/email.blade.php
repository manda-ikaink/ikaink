@extends(layout())

@section('header', 'Reset Password')

@section('content')
  <div class="fusion-auth fusion-auth__reset-email">
    <div class="container">
      {!! Form::open(['url' => 'password/email', 'class' => 'fusion-form fusion-form__reset-email', 'role' => 'form']) !!}
        <fieldset>
          <legend>Reset Your Password</legend>

          @include('fields.user.email', [ 'required' => true, 'placeholder' => 'Email', 'class' => false ])

          <hr>

          @include('fields.default.submit', ['text' => 'Send Reset Link', 'class' => null])

          <p class="help-block">
            <a href="{{ route('users.login') }}">I have an account</a>
            @if (setting('user_registration') === 'enabled')
             // <a href="{{ route('users.register') }}">I don't have an account</a>
            @endif
          </p>

        </fieldset>
      {!! Form::close() !!}
    </div>
  </div>
@endsection