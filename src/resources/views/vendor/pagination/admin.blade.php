@if ($paginator->hasPages())
<ul class="pagination pull-right">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li class="paginate_button previous disabled"><a href="javascript:void(0)">@lang('pagination.previous')</a></li>
    @else
        <li class="paginate_button previous"><a href="{{ $paginator->previousPageUrl() }}">@lang('pagination.previous')</a></li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li class="paginate_button disabled"><a href="javascript:void(0)">{{ $element }}</a></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="paginate_button active"><a href="{{ $url }}">{{ $page }}</a></li>
                @else
                    <li class="paginate_button"><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li class="paginate_button next"><a href="{{ $paginator->nextPageUrl() }}">@lang('pagination.next')</a></li>
    @else
        <li class="paginate_button next disabled"><a href="javascript:void(0)">@lang('pagination.next')</a></li>
    @endif
</ul>
@endif

