@extends('front.app')
@section('content')
<div id="single-page">
    <div class="jumbo">
      <a class="link" href="/">Home</a>
      <a class="link" href="{{route('page.type',['type'=>$data->type])}}">Programs</a>
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
          

            <div class="short-desc">
              {{$data->short_desc}}
            </div>
          
            @php
                $i=0;
            @endphp
            <div class="tabs">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach ($type[2] as $key => $descType)
                <li class="nav-item" role="presentation">
                  <button class="nav-link {{$i++==0?'active':''}}" id="home-tab" data-bs-toggle="tab" data-bs-target="#{{$key}}"
                    type="button" role="tab" aria-controls="home" aria-selected="true">{{$descType}}</button>
                </li>
                @php
                    $i+=1;
                @endphp
                @endforeach
              
              </ul>
              @php
                $desc=(array)(json_decode($data->desc));
                $i=0;
               @endphp
              <!-- Tab panes -->
              <div class="tab-content">
                @foreach ($type[2] as $key => $descType)
                  <div class="tab-pane p-2 {{$i==0?'active':''}}" id="{{$key}}" role="tabpanel" aria-labelledby="{{$key}}-tab">
                    {!!$desc[$key]!!} 
                  </div>
                  @php
                    $i+=1;
                  @endphp
                @endforeach
               
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
