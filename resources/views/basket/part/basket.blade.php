<a class="nav-link @if ($positions) text-dark @endif"
   href="{{ route('basket.index') }}">
    <p class="fa fa-shopping-cart"></p>
    @if ($positions) ({{ $positions }}) @endif
</a>
