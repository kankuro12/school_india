@extends('front.layout.app')
@section('content')
<div id="single-page">
    <div class="jumbo">
      <a class="link" href="/">Home</a>
      <a class="link" href="{{route('events')}}">Events</a>
      <span class="link">{{$data->title}}</span>
    </div>
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="title">
                {{$data->title}}
            </div>
            <div class="feature-image">
              <img id="feature-image" src="{{asset($data->image)}}" alt="">
            </div>
            <div class="d-block d-md-flex justify-content-between py-3">
                <div class="col-md-4 p-0">
                  <span>
                    <span class="text-yellow-lite pe-1">
                      <i class="fas fa-calendar-alt"></i>
                    </span>
                    <span class="fw-bolder">
                        {{$data->start->format('jS M, Y')}}
                  
                    </span>
                    -
                    <span class="fw-bolder">
                        {{$data->end->format('jS M, Y')}}

                    </span>
                  </span>
                </div>
                <div class="col-md-4 p-0 text-start text-md-center">
                  <span>
                    <span class="text-yellow-lite pe-1">
                      <i class="fas fa-clock"></i>
                    </span>
                    <span class="fw-bolder">
                      {{$data->start_time}}
                    </span>
                    -
                    <span class="fw-bolder">
                        {{$data->end_time}}

                    </span>
                  </span>
                </div>
                <div class="col-md-4 p-0 text-start text-md-end">
                  <span>
  
                    <span class="text-yellow-lite pe-1">
                      <i class="fas fa-map-marker-alt me-1"></i>
                    </span>
                    <span class="fw-bolder">
                      {{$data->addr}}
                    </span>
  
                  </span>
                </div>
              </div>
          
            <div class="short-desc">
              {{$data->short_desc}}
            </div>
            <div class="desc">
                {!!$data->desc!!}
              </div>
          
           
          </div>
          <div class="col-md-3"></div>
        </div>
        

      </div>
    </div>
  </div>
@endsection
@section('script')

    <script>
      function resize(ele) {
      let h = $(ele).height();
      let w = $(ele).width();
      let _h = $(ele).parent().height();
      let _w = $(ele).parent().width();
      if (h > 400) {
        $(ele).parent().height("400px");
        let ratio = 400 / h;
        $(ele).height('400px');
        $(ele).width((ratio * w) + 'px');
      }
    }
    $(document).ready(function () {
      resize(document.getElementById('feature-image'));
      
      
    });
    </script>
    
   
@endsection
