@extends('front.app')
@section('content')
    <div id="single-page">
        <div class="jumbo">
            <a class="link" href="/">Home</a>
            <span class="link">Events</span>
        </div>
        <div class="content">
            <div class="container">
                <div class="events">
                    @foreach ($data  as $event)
                        
                        <div class="single-event" id="event-{{$event->id}}">
                        <div class="row">
                            <div class="col-md-4 " style="max-height: 200px;overflow:hidden;">
                            <img class="w-100" src="{{asset($event->image)}}" alt="">
                            </div>
                            <div class="col-md-8">
                            <div class="title"> {{$event->title}}</div>
                            <div class="d-block d-md-flex justify-content-between">
                                <span class="date d-inline-block">
                                  <span class="fa-holder">
                                    <i class="fas fa-clock me-1"></i>
                                  </span>
                                  <small>{{$event->start->format('jS M, Y')}} </small>
                                  -
                                  <small>{{$event->start->format('jS M, Y')}}</small>
                                </span>
                                <span class="d-inline-block">
                                  <small>
                                    <span class="fa-holder">
                                      <i class="fas fa-map-marker-alt me-1"></i>
                                    </span>
                                    <span>
                                      {{$event->addr}}
                                    </span>
              
                                  </small>
                                </span>
                              </div>
                            <div class="desc">
                                {{$event->short_desc}}
                            </div>
                            <div class="py-2">
                                <a class="view-detail" href="{{route('event',['id'=>$event->id])}}">View Detail</a>
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
