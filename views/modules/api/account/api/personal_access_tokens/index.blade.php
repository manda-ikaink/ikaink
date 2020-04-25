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
        
        @if(Session::has('token'))
          <div class="alert alert-success" role="alert">
            <h4>Token Generated Successfully</h4>
            <p>Make sure to copy your new personal access token now and store it in a secure location. You won’t be able to see it again! If you lose it, you will need to re-generate a new token.</p>
            
            <p>
              <pre class="p-3">{{ Session::get('token') }}</pre>
            </p>
          </div>
          <br>
        @endif

        @if ($tokens->count())
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tokens as $token)
                <tr scope="row">
                  <td>{{ $token->name }}</td>
                  <td class="text-right">
                    <a href="/account/tokens/{{ $token->id }}/edit" class="btn btn-primary btn-sm">Edit</a>              
                    @can('api.personal.delete')
                    <a href="/account/tokens/{{ $token->id }}/delete" class="btn btn-danger btn-sm">Delete</a>
                    @endcan
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <p>
            <a href="/account/tokens/create" class="btn btn-primary">Generate New Token</a>
          </p>
        @else
          <p class="text-center lead">You have not created any personal access tokens.</p>
        @endif
      </div>
    </div>
  </div>
@endsection