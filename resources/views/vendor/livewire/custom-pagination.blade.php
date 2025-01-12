@if ($paginator->hasPages())
    <div class="row align-items-center">
        {{-- Pagination Links (Left-Aligned) --}}
        <div class="col-sm-12 col-md-7 d-flex justify-content-center justify-content-md-start">
            <div class="dataTables_info">
                Total {{ $paginator->total() }}
            </div>
        </div>

        {{-- Showing Data Count (Right-Aligned) --}}
        <div class="col-sm-12 col-md-5 d-flex justify-content-center justify-content-md-end">
            <ul class="pagination mb-0">
                {{-- Previous Page Link --}}
                <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <i class="previous"></i>
                    </a>
                </li>

                {{-- Next Page Link --}}
                <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <i class="next"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endif
