{{-- $globals variable inherited from layouts/default.blade.php --}}
@if($isHome)
<footer>
  <div class="container">
    <a href="#credit-box" data-fancybox>Credits</a>
    <div class="d-none">
      <div id="credit-box">
        <ul>
          <li>Build on <a href="https://beta.getfusioncms.com/" target="_blank" rel="noopener">Fusion CMS</a>.
          <li>Nebula background image sourced from <a href="https://www.deviantart.com/filipe-ps/art/iOS-7-Nebula-Wallpaper-379227797" target="_blank" rel="noopener">iOS 7 Nebula Wallpaper
          </a> by Filipe.</li>
          <li>Star chart background image sourced from <a href="https://creativemarket.com/skyboxcreative/448990-Constellations-Vector-Set" target="_blank" rel="noopener">Creative Market</a> by Skybox Creative.</li>
          <li>Shooting star effect sourced from <a href="https://codepen.io/YusukeNakaya/details/XyOaBj" target="_blank" rel="noopener">Only CSS: Shooting Star Codepen</a> by Yusuke Nakaya.</li>
        </ul>
      </div>
    </div>
  </div>
</footer>
@else
@if ($globals)
<footer class="page-footer">
	<div class="container">
    <div class="row">
      @if (menu_exists('footer_menu'))
      <div class="page-footer__nav col-lg-9">
        @include('partials.navigation.nav-footer', [
          'items' => menu('footer_menu')->roots(), 
          'id'    => 'main'
          ])
      </div>
      @endif

      @if ($globals->social_media_display)
      <div class="page-footer__social col-lg-3 d-flex justify-content-center justify-content-lg-right">
        @include('partials.social-media.links', [
          'facebook'  => $globals->facebook,
          'instagram' => $globals->instagram,
          'twitter'   => $globals->twitter,
          'youtube'   => $globals->youtube,
          'linkedin'  => $globals->linkedin,
          'pinterest' => $globals->pinterest
          ])
      </div>
      @endif

      <div class="page-footer__copyright wysiwyg text-center col-lg-12">
        @if ($globals->copyright)
          {!! $globals->copyright !!}
        @else
          <p>Copyright &copy; {{ setting('website_title') }}</p>
        @endif
      </div>
    </div>
  </div>
</footer>
@endif
@endif
