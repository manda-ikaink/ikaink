{!! Form::open(['url' => 'login', 'class' => 'fusion-form fusion-form__login', 'role' => 'form']) !!}
	<fieldset>
		<legend>Please Log in to Continue</legend>

		@include('fields.user.email', [ 'required' => true, 'placeholder' => 'Email', 'class' => false ])

		@include('fields.user.password', [ 'required' => true, 'placeholder' => 'Password', 'class' => false ])

		@include('fields.user.remember')

		<hr>

		@include('fields.default.submit', ['text' => 'Login', 'class' => null])

		<p class="help-block">
			<a href="{{ route('users.password.email')}}">I forgot my password</a>
			@if (setting('user_registration') === 'enabled')
             // <a href="{{ route('users.register') }}">I don't have an account</a>
            @endif
		</p>
	</fieldset>
{!! Form::close() !!}