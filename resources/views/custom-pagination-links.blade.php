<div>




    @if ($paginator->hasPages())
        <div class="paginator-container">
            <ul class="pagination modal">

                @if ($paginator->onFirstPage())
                    <li><button disabled class="prev">Previous</button></li>
                @else
                    <li><button wire:click='previousPage' class="prev">Previous</button></li>
                @endif

                @foreach ($elements as $element)
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li><button wire:click='gotoPage({{ $page }})' class="active">{{ $page }}</button>
                                </li>
                            @else
                                <li><button wire:click='gotoPage({{ $page }})'>{{ $page }}</button></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach




                @if ($paginator->hasMorePages())
                    <li><button wire:click='nextPage' class="next">Next</button></li>
                @else
                    <li><button disabled class="next">Next</button></li>
                @endif





            </ul>
        </div>
    @endif





</div>
