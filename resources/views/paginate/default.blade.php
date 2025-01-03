@if ($paginator->lastPage() > 1)
<div class="pagination-container margin-top-20 margin-bottom-40">
    <nav class="pagination">
        <ul class="">
            @if($paginator->currentPage() != 1)
            <li >
                <a href="{{ $paginator->url($paginator->currentPage()-1) }}"><i class="sl sl-icon-arrow-left"></i></a>
            </li>
            @endif
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <li class="">
                    <a class="{{ ($paginator->currentPage() == $i) ? 'current-page' : '' }}" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            @if($paginator->currentPage() != $paginator->lastPage())
            <li>
                <a href="{{ $paginator->url($paginator->currentPage()+1) }}" ><i class="sl sl-icon-arrow-right"></i></a>
            </li>
            @endif
        </ul>
    </nav>
</div>
@endif