@if ($paginator->hasPages())
    <nav class="d-flex justify-content-center mt-4" aria-label="Pagination Navigation">
        <ul class="pagination custom-pagination flex-wrap align-items-center gap-2 mb-0">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="Previous">
                    <span class="page-link page-nav" aria-hidden="true">
                        <i class="bi bi-chevron-right"></i>
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link page-nav" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </li>
            @endif
            @php
                $current = $paginator->currentPage();
                $last = $paginator->lastPage();
                $start = max($current - 1, 1);
                $end = min($current + 1, $last);
if ($current <= 2) {
                    $end = min(3, $last);
                }
if ($current >= $last - 1) {
                    $start = max($last - 2, 1);
                }
            @endphp
            @if ($start > 1)
                <li class="page-item">
                    <a class="page-link page-number" href="{{ $paginator->url(1) }}">1</a>
                </li>
                @if ($start > 2)
                    <li class="page-item disabled d-none d-sm-inline-flex">
                        <span class="page-link page-dots">...</span>
                    </li>
                @endif
            @endif
            @for ($page = $start; $page <= $end; $page++)
                @if ($page == $current)
                    <li class="page-item active" aria-current="page">
                        <span class="page-link page-number">{{ $page }}</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link page-number" href="{{ $paginator->url($page) }}">{{ $page }}</a>
                    </li>
                @endif
            @endfor
            @if ($end < $last)
                @if ($end < $last - 1)
                    <li class="page-item disabled d-none d-sm-inline-flex">
                        <span class="page-link page-dots">...</span>
                    </li>
                @endif
                <li class="page-item">
                    <a class="page-link page-number" href="{{ $paginator->url($last) }}">{{ $last }}</a>
                </li>
            @endif
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link page-nav" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="Next">
                    <span class="page-link page-nav" aria-hidden="true">
                        <i class="bi bi-chevron-left"></i>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
