@extends('front.app')
@section('content')
<div id="single-page">
    <div class="jumbo">
      <a class="link" href="/">Home</a>
      <span class="link">{{$data->title}}</span>
    </div>
    <div class="content">
      <div class="container">
          <div class="row">
            @php $desc= json_decode($data->desc);@endphp
              <div class="col-md-8">
                  <div class="short_desc">
                      {{$data->short_desc}}
                  </div>
                  <div class="desc">
                    {!! $desc->msg_4 !!}
                  </div>
              </div>
              <div class="col-md-4 text-center">
                  <div class="py-3">
                      <img src="{{asset($data->image)}}" class="w-100" alt="">
                  </div>
                  <h4 class="m-0 pt-2">
                      {{$desc->msg_1}}
                  </h4>
                  <h6 class="m-0 pt-2">
                    {{$desc->msg_2}}
                  </h6>
                  <h6 class="m-0 pt-2">
                    {{$desc->msg_3}}
                  </h6>
              </div>
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
    
    @if ($data->files->count()>0)
      @include('front.pages.single.gallery_module')
    @endif
@endsection
