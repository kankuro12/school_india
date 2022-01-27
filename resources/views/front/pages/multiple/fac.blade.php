@extends('front.app')
@section('content')
    <div id="single-page">
        <div class="jumbo">
            <a class="link" href="/">Home</a>
            <span class="link">{{ $pageType[1] }}</span>
        </div>
        <div class="content">
            <div class="container">
                <div class="facilities">
                    <div class="row">
                        @foreach ($data  as $page)
                            <div class="col-md-6 text-center">
                                <div class="facility">
                                <img src="{{asset($page->image)}}" alt="">
                                <h5>{{$page->title}}</h5>
                                <p>{{$page->short_desc}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
@endsection
@section('script')


@endsection
