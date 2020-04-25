@extends(layout())

@section('header', 'Account')

@section('content')
  <div class="fusion-account fusion-account__profile">
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
        <h2 class="fusion-account__title">Profile</h2>

        {!! Form::open(['route' => ['users.account.profile'], 'class' => 'fusion-form fusion-form__account-profile', 'role' => 'form']) !!}

          @include('fields.user.first_name', [ 'required' => true, 'value' => $currentUser->first_name, 'placeholder' => 'First Name', 'class' => false  ])

          @include('fields.user.last_name', [ 'required' => false, 'value' => $currentUser->last_name, 'placeholder' => 'Last Name', 'class' => false  ])

          @include('fields.user.email', [ 'required' => true, 'value' => auth()->user()->email, 'placeholder' => 'Email', 'class' => false  ])
  
          @foreach($currentUser->fields->groupBy('group') as $group => $fields)
            <div class="form-section form-section__{{ str_replace(' ', '-', strtolower($group)) }}">
              @if($group != 'General')
                <h3 class="fusion-form_group-title">{{ $group }}</h3>
              @endif

              @foreach($fields as $field)
                @include('fields.default.' . $field->type, [ 'field' => $field, 'value' => $currentUser->{$field->handle}, 'class' => false  ])
              @endforeach
            </div>
          @endforeach
          
          @include('fields.default.submit', ['text' => 'Save', 'class' => null])

        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection