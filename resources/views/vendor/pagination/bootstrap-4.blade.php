@if ($paginator->hasPages())
<nav class="pagination is-centered" role="navigation" aria-label="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <a class="pagination-previous" title="{{__('pagination.first_page_message')}}" disabled>{{__('pagination.previous')}}</a>
    @else
    <a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}">{{__('pagination.previous')}}</a>
    @endif
    <ul class="pagination-list">
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li><span class="pagination-ellipsis">&hellip;</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li><a class="pagination-link is-current" title="{{__('pagination.page')}} {{ $page }}" aria-current="page">{{ $page }}</a></li>
        @else
        <li><a class="pagination-link" title="{{__('pagination.goto_page')}} {{ $page }}" href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach
    </ul>
    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}">{{__('pagination.next')}}</a>
    @else
    <a class="pagination-next" title="{{__('pagination.last_page_message')}}" disabled>{{__('pagination.next')}}</a>
    @endif

</nav>
@endif