@extends('front.app')
@section('content')
<div id="single-page">
    <div class="jumbo">
      <a class="link" href="/">Home</a>
      <a class="link" href="{{route('gallery.type')}}">Galleries</a>
      <span class="link">{{$type->name}}</span>
    </div>
    <div class="content">
      <div class="container">
        <div class="py-3">
          <div id="gallery" class="gallery">
            @php
                $i=0;
            @endphp
            @foreach ($images as $file)   
            <div class="item" data-index="{{$i++}}">
              <img data-org="{{asset($file->file)}}"  src="{{asset($file->thumb)}}" alt="">
            </div>
            @endforeach 
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
@include('front.pages.single.gallery_full')
@endsection
