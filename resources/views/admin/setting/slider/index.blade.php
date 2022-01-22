@extends('admin.layout.app')
@section('css')

@endsection
@section('page-option')
<a class="btn btn-primary" href="{{route('admin.slider.add')}}">
   Add New Slider
</a>
@endsection
@section('s-title')
    <li class="breadcrumb-item">
        Sliders
    </li>
    
@endsection
@section('content')

<div class="card shadow">
    <div class="card-body">
        @foreach ($sliders as $slider)
            <div class="shadow">
                <div class="card-body">
                    
                </div>
            </div>
        @endforeach
    </div>
</div>


@endsection
@section('script')
<script>
    
</script>
@endsection
