@extends(layout())

@section('header', 'Account')

@section('content')
  <div class="fusion-account fusion-account__password">
    <div class="container">
      <div class="fusion-account__sidebar">
        <div class="fusion-account__avatar">
           @include('users::components.account-avatar')
        </div>

        <div class="fusion-account__navigation">
          @include('users::components.account-navigation')
        </div>
      </div>

      <div class="fusion-account__content">
        <h2 class="fusion-account__title">Change Password</h2>
        
        {!! Form::open(['route' => ['users.account.password'], 'class' => 'fusion-form fusion-form__account-password', 'role' => 'form']) !!}
          @include('fields.user.password', [ 'required' => true, 'placeholder' => 'Password', 'class' => false ])

          @include('fields.user.password_confirmation', [ 'required' => true, 'placeholder' => 'Confirm Password', 'class' => false ])

          @include('fields.default.submit', ['text' => 'Save', 'class' => null])
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection