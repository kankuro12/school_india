@foreach ($curdata as $key=>$item)
    @if ($item!="#")     
        <a href="{{$item}}" class="social-link">
            <i class="fab fa-facebook-f"></i>
        </a>
    @endif
@endforeach