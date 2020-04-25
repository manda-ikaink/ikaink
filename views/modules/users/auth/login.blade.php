@extends(layout())

@section('header', 'Login')

@section('content')
	<div class="fusion-auth fusion-auth__login">
		<div class="container">
			@include('users::components.auth-login')
		</div>
	</div>
@endsection