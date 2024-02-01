@if ($paginator->hasPages())
    <ul class="pagination inline-flex gap-x-4">
        @if (!$paginator->onFirstPage())
            <li>
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="rounded bg-violet-50 px-2 py-2 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-violet-100"
                    rel="prev" aria-label="@lang('pagination.previous')">&laquo;
                    Previous</a>
            </li>
        @endif
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="rounded bg-violet-50 px-2 py-2 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-violet-100"
                    rel="next" aria-label="@lang('pagination.next')">Next &raquo;</a>
            </li>
        @endif
    </ul>
@endif
