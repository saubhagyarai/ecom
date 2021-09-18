@if ($paginator->hasPages())
<div class="pagination-style mt-30 text-center">
        {{-- <ul class="pagination"> --}}
            <ul>

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <li class="disabled"><a href="#"><i class="ti-angle-left" aria-disabled="true"></i></a></li>
            @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}"><i class="ti-angle-left"></i></a>
            </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                {{-- @if (is_string($element))
                    <li class="page-item" aria-disabled="false"><span class="page-link">{{ $element }}</span></li>
                @endif --}}

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li  class="active"><a href="#">{{ $page }}</a></li>                            
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}"><i class="ti-angle-right"></i></a></li>

            @else
                <li><a href="#"><i class="ti-angle-right disabled" aria-disabled="true"></i></a></li>
            @endif
        </ul>
</div>

@endif
