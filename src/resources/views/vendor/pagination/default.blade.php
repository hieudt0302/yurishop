@if ($paginator->hasPages())
    <ul class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <!-- <li class="prev">prev</li> -->
    @else
        <li><a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-caret-left"></i></a></li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li><a href="#">{{ $element }}</a></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active"><a href="#">{{ $page }}</a></li>
                @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-caret-right"></i></a></li>
    @else
        <!-- <li class="next"><span>next</span></li> -->
    @endif
    </ul>
@endif
