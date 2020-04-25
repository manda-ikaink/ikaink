@if ($display)
  <div class="alert-banner alert-banner--{{ $display }} bg--{{ $color ?? null }} text-center  alert-dismissible fade show">
    <div class="alert-banner__content text-center wysiwyg container">
      {!! $content !!}
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif