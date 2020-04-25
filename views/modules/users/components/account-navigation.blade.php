@foreach(menu('user_account')->roots() as $item)
  <a class="fusion-account__nav-link {{ $item->isActive() ? 'fusion-account__nav-link--active' : null }}" href="{{ $item->url() }}">{{ $item->title }}</a>
@endforeach
@can('core.access.admin')
  <a class="fusion-account__nav-link" href="{{ route('admin') }}" target="_blank">Control Panel</a>
@endcan
<a class="fusion-account__nav-link" href="{{ route('users.logout') }}">Logout</a>