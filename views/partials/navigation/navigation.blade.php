<ul class="nav{{ isset($class) ? ' ' . $class : null }}" id="nav-{{ $id }}">
    @foreach ($items as $item)
      <li class="nav__item{{ $item->isActive() ? ' nav__item--active' : null }}">
        <a id="nav-link-{{ $loop->index }}" class="nav__link" href="{{ $item->url() }}" 
        target="{{ $item->attributes['target'] }}">
          {{ $item->title }}
        </a>
      </li>
    @endforeach
  </ul>
  