@if (rand(0, 2) == 1)
    <span class="sale">Sale</span>
@elseif (rand(0, 2) == 2)
    <span class="hot">Hot</span>
@else
    {{-- <span class="new">New</span> --}}
@endif
