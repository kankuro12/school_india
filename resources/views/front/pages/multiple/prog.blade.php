@extends('front.layout.app')
@section('content')
    <div id="single-page">
        <div class="jumbo">
            <a class="link" href="/">Home</a>
            <span class="link">{{ $pageType[1] }}</span>
        </div>
        <div class="content">
            <div class="container">
                <div class="events">
                    @foreach ($data  as $page)
                        
                        <div class="single-event" id="page-{{$page->id}}">
                        <div class="row">
                            <div class="col-md-4">
                            <img class="w-100" src="{{asset($page->image)}}" alt="">
                            </div>
                            <div class="col-md-8">
                            <div class="title"> {{$page->title}}</div>
                           
                            <div class="desc">
                                {{$page->short_desc}}
                            </div>
                            <div class="py-2">
                                <a class="view-detail" href="{{route('page',['id'=>$page->id])}}">View Detail</a>
                            </div>
            
                            </div>
                        </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')


@endsection
