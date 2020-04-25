{{-- $globals variable inherited from layouts/default.blade.php --}}

<footer class="page-footer">
  <div class="container d-flex flex-column flex-lg-row-reverse justify-content-center justify-content-lg-between pt-4">
    @if ($globals)
    <div class="page-footer__social text-center mb-4">
      @include('partials.social-media.links', [
          'class'     => 'justify-content-center mb-0',
          'github'    => $globals->github,
          'instagram' => $globals->instagram,
          'twitter'   => $globals->twitter,
          'youtube'   => $globals->youtube,
          'linkedin'  => $globals->linkedin,
          'pinterest' => $globals->pinterest
          ])
    </div>
    @endif

    <div class="page-footer__copyright d-lg-flex align-items-lg-center justify-content-center justify-content-lg-end text-center mb-4">
      <p class="mb-0 ml-lg-2">&copy;{{ now()->year }} {{ setting('website_title') }} - All rights reserved.</p>
      <p class="mb-0 ml-lg-2">
        <a href="/privacy-policy">Privacy Policy</a>&nbsp;|&nbsp;
        <a href="/terms-of-service">Terms of Service</a>&nbsp;|&nbsp;
        <a href="/sitemap">Sitemap</a>&nbsp;|&nbsp;
        <a href="#credits" id="credits-link"  data-toggle="modal" data-target="#credits" aria-label="Open credits">Credits</a>
      </p>
    </div>
  </div>
</footer>

<div class="modal fade" id="credits" tabindex="-1" role="dialog" aria-labelledby="credits-link" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="credits-title">Credits</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6>Platforms, tools and Libraries</h6>
        <ul>
          <li>Content management system: <a href="https://beta.getfusioncms.com/" target="_blank" rel="noopener noreferrer">FusionCMS</a>.
          <li>Frontend framework: <a href="https://getbootstrap.com/" target="_blank" rel="noopener noreferrer">Bootstrap</a></li>
        </ul>

        <h6>Resources</h6>
        <ul>
          <li>Nebula background image sourced from <a href="https://www.deviantart.com/filipe-ps/art/iOS-7-Nebula-Wallpaper-379227797" target="_blank" rel="noopener noreferrer">iOS 7 Nebula Wallpaper
          </a> by Filipe.</li>
          <li>Star chart background image sourced from <a href="https://creativemarket.com/skyboxcreative/448990-Constellations-Vector-Set" target="_blank" rel="noopener noreferrer">Creative Market</a> by Skybox Creative.</li>
          <li>Shooting star effect sourced from <a href="https://codepen.io/YusukeNakaya/details/XyOaBj" target="_blank" rel="noopener noreferrer">Only CSS: Shooting Star Codepen</a> by Yusuke Nakaya.</li>
        </ul>
      </div>
    </div>
  </div>
</div>