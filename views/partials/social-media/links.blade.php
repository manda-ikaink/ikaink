@if ($github or $instagram or $pinterest or $twitter or $youtube or $linkedin)
  <ul class="social-list {{ $class ?? null }} list-unstyled d-flex">
    @if ($github)
      <li class="social-list__item">
        <a class="social-list__link" href="{{ $github }}" target="_blank" rel="noopener">
          <span class="sr-only">Github</span>
          <span class="fab fa-github fa-fw" aria-hidden="true"></span>
        </a>
      </li>
    @endif
    @if ($instagram)
      <li class="social-list__item">
        <a class="social-list__link" href="{{ $instagram }}" target="_blank" rel="noopener">
          <span class="sr-only">Instagram</span>
          <span class="fab fa-instagram fa-fw" aria-hidden="true"></span>
        </a>
      </li>
    @endif
    @if ($twitter)
      <li class="social-list__item">
        <a class="social-list__link" href="{{ $twitter }}" target="_blank" rel="noopener">
          <span class="sr-only">Twitter</span>
          <span class="fab fa-twitter fa-fw" aria-hidden="true"></span>
        </a>
      </li>
    @endif
    @if ($youtube)
      <li class="social-list__item">
        <a class="social-list__link" href="{{ $youtube }}" target="_blank" rel="noopener">
          <span class="sr-only">YouTube</span>
          <span class="fab fa-youtube fa-fw" aria-hidden="true"></span>
        </a>
      </li>
    @endif
    @if ($linkedin)
      <li class="social-list__item">
        <a class="social-list__link" href="{{ $linkedin }}" target="_blank" rel="noopener">
          <span class="sr-only">LinkedIn</span>
          <span class="fab fa-linkedin-in fa-fw" aria-hidden="true"></span>
        </a>
      </li>
    @endif
    @if ($pinterest)
      <li class="social-list__item">
        <a class="social-list__link" href="{{ $pinterest }}" target="_blank" rel="noopener">
          <span class="sr-only">Pinterest</span>
          <span class="fab fa-pinterest-p fa-fw" aria-hidden="true"></span>
        </a>
      </li>
    @endif
  </ul>
@endif