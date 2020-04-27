@if ($paginator->hasPages())
<div class="container d-flex justify-content-center">
    <ul class="pagination">
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
            <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                @else
                <li class="page-item"><a class="page-link" href="{{ request()->fullUrlWithQuery(['page'=>$page]) }}">{{ $page }}</a></li>
                @endif
            @endforeach
            @endif
        @endforeach
    </ul>
</div>
@endif
