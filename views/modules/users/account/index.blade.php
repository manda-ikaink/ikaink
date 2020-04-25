@extends(layout())

@section('header', 'Account')

@section('content')
  <div class="fusion-account fusion-account__index">
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
        <h2 class="fusion-account__title">Account Overview</h2>
        
        <dl>
          <dt>Your Name:</dt> <dd>{{ $user->fullName }}</dd>
        
          <dt>Email:</dt> <dd>{{ $user->email }}</dd>
        
          <dt>Joined:</dt> <dd>{{ $user->created_at->diffForHumans() }}</dd>
        </dl>

        @foreach($user->fields->groupBy('group') as $group => $fields)
          <div class="account-section account-section__{{ str_replace(' ', '-', strtolower($group)) }}">
            <h3 class="account-section__title">{{ $group }}</h3>

            <dl>
              @foreach($fields as $field)
                <dt>{{ $field->name }}:</dt> 
                @if (is_array($currentUser->{$field->handle}))
                  @foreach($currentUser->{$field->handle} as $value)
                    <dd>{{ $value }}</dd>
                  @endforeach
                @else
                  <dd>{{ $currentUser->{$field->handle} }}</dd>
                @endif
              @endforeach
            </dl>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection