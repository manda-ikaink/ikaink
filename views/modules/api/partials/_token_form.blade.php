<p>Personal access tokens function like ordinary OAuth access tokens. They can be used to easily authenticate with the API over Basic Authentication.</p>

<div class="form-group">
  <label for="name">Name</label>
  {{ Form::text('name', old('name', $token->name ?? null), ['class' => 'form-control', 'placeholder' => 'What\'s this token for?']) }}
</div>

<p>
  @include('fields.default.submit', ['text' => $submitText ?? 'Generate Token', 'class' => null])
</p>