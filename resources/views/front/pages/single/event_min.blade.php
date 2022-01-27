
<style>
    .other{
        display: block;
        color: inherit;
        text-decoration: none;
        padding-bottom: 10px;
        border-bottom: 1px solid rgb(211, 211, 211);
        margin-bottom: 15px;
    }
    .other:last-child{
        border-bottom: none;
    }
</style>

@foreach ($others as $other)
    
<a href="{{route('page',['id'=>$other->id])}}" class="other">
    <img src="{{asset($other->image)}}" alt="" class="w-100">
    <h6 class="pt-2 fw-bolder">{{$other->title}}</h6>
</a>
@endforeach
