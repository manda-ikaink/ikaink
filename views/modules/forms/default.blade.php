@if(isset($form))
  {!! Form::open(['route' => ['forms.response.store'], 'files' => true, 'class' => 'fusion-form']) !!}
    <div class="row"> 
      @foreach($fieldGroups as $group => $fields)
        @foreach($fields as $field)
          @include('fields.default.' . $field->type, ['field' => $field, 'value' => $field->value,  'validate' => false, 'class' => 'col-12'])
        @endforeach
      @endforeach

      @foreach ($additional as $field => $value)
        {!! Form::hidden($field, $value) !!}
      @endforeach

      {!! Form::hidden('form_id', $form->id) !!}

      {!! honeypot_fields() !!}

      @if(isset($form->captcha_enabled) && $form->captcha_enabled)
        {!! captcha() !!}
      @endif

      <div class="col-12 form-group-sm text-right">
        @include('fields.default.submit', ['text' => 'Submit Form', 'class' => null])
      </div>
    </div>
  {!! Form::close() !!}

  @if(isset($form->captcha_enabled) && $form->captcha_enabled)
    @push('bottomScripts')
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
      <script>
        var forms = document.querySelectorAll('.fusion-form');
        Array.from(forms).forEach(function(form) {
          form.addEventListener("submit", function(event){
            if (grecaptcha.getResponse() === '') {                            
              event.preventDefault();
              alert('Captcha required for form submission.');
            }
          }, false);
        })   
      </script>
    @endpush
  @endif
@endif