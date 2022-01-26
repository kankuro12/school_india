@extends('front.app')
@section('content')
<div id="single-page">
    <div class="jumbo">
      <a class="link" href="/">Home</a>
      <a class="link" href="{{route('page.type',['type'=>$data->type])}}">News</a>
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
                  <span class="">
                      {{$data->created_at->format('jS M, Y')}}
                
                  </span>
                </span>
              </div>
            </div>
          

            <div class="short-desc">
              {{$data->short_desc}}
            </div>
            <div class="desc">
              {{$data->desc}}
            </div>
              @php
                  $i=0;
              @endphp
              @if ($data->files->count()>0)
              <div class="py-3">
                <div class="gallery">
                  @foreach ($data->files as $file)
                      
                  @endforeach 
                  <div class="item" data-index="{{$i++}}">
                    <img src="{{asset('uploads/setting/logo.jpg')}}" data-src="{{asset($file->file)}}" alt="">
                  </div>
                </div>
              </div>
              @endif
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
    
    @if ($data->files->count()>0)
      @include('front.pages.single.gallery_module')
    @endif
@endsection
