@extends(layout())

@section('header', 'Account')

@section('content')
  <div class="fusion-account fusion-account__token">
    <div class="container">
      <div class="fusion-account__sidebar">
        <div class="fusion-account__avatar">
           @include('users::components.account-avatar')
        </div>

        <div class="fusion-account__nav">
          @include('users::components.account-navigation')
        </div>
      </div>

      <div class="fusion-account__content">
        <h2 class="fusion-account__title">Personal Access Tokens</h2>
        
        {!! Form::open(['route' => ['users.account.tokens.update', $token->id], 'role' => 'form', 'class' => 'form']) !!}
          @include('api::partials._token_form', ['submitText' => 'Save Token'])
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection