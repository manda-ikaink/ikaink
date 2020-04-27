<div class="container d-flex justify-content-between align-items-center">
    <span>Page {{ $paginator->currentPage()}} of {{ $paginator->lastPage() }}</span>
    <span>{{ $paginator->total() }} {{ ($paginator->total() > 1) ? 'total posts' : 'post'}}</span>
</div>