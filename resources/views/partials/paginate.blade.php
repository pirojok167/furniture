<ul class="pagination justify-content-center mb-0 mt-2">
    @if($items->lastPage() > 1)
        @if($items->currentPage() !== 1)
            <li class="page-item"><a class="page-link text-green"
                                     href="{{ $items->url($items->currentPage() - 1) }}">назад</a>
            </li>
        @endif
        @for($i = 1; $i <= $items->lastPage(); $i++)
            @if($items->currentPage() == $i)
                <li class="page-item"><a class="page-link selected disabled" >{{ $i }}</a></li>
            @else
                <li class="page-item"><a class="page-link text-green" href="{{ $items->url($i) }}">{{ $i }}</a></li>
            @endif
        @endfor
        @if($items->currentPage() !== $items->lastPage())
            <li class="page-item">
                <a class="page-link text-green"
                   href="{{ $items->url($items->currentPage() + 1) }}">вперёд</a>
            </li>
        @endif
    @endif
</ul>