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
        <a href="/credits">Credits</a>
      </p>
    </div>
  </div>
</footer>