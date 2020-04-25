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
        
        {!! Form::open(['method' => 'delete', 'route' => ['users.account.tokens.destroy', $token->id], 'role' => 'form', 'class' => 'form']) !!}
            <div class="alert alert-danger" role="alert">
              <h4>Are you sure you want to delete this token?<br><small>{{ $token->name }}</small></h4>
              
              <p>
                Any applications or scripts using this token will no longer be able to access the API. You cannot undo this action.
              </p>
            </div>
            <br>
        
            <p class="text-center">
              <button type="submit" class="btn btn-danger">I understand, delete this token</button>
              <a href="/account/tokens" class="btn btn-primary">Nevermind, take me back</a>
            </p>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection