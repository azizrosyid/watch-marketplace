@php
$rating = rand(1, 50) / 10;
$width = $rating * 20;
@endphp
<div class="product-rate d-inline-block">
    <div class="product-rating" style="width: {{ $width }}%">
    </div>
</div>
<span class="font-small ml-5 text-muted">
    ({{ $rating }})</span>
