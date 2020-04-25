@if (Session::has('caffeinated.flash.message'))
	<div class="alert alert-{{ Session::get('caffeinated.flash.level') }} alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>

		<div class="container">{{ Session::get('caffeinated.flash.message') }}</div>
	</div>
@endif

@if ($errors->any())
  <div class="alert alert-danger alert-dismissible show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="container">
      <p>Uh oh! Seems there were some validation issues with your form submission.</p>

      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
	</div>
@endif
