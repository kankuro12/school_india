@extends('front.app')
@section('content')
    <div id="single-page">
        <div class="jumbo">
            <a class="link" href="/">Home</a>
            <span class="link">Notices</span>
        </div>
        <div class="content">
            <div class="container">
                <div class="notices">
                    @foreach ($data  as $page)
                    <div class="single-notice">
                        <div class="title p-0 pb-1">
                          <a href="{{route('page',['id'=>$page->id])}}">
            
                            {{$page->title}}
            
                          </a>
                        </div>
                        <div class="d-block d-md-flex">
                          <div class="col-md-4">
                            <span class="text-yellow-lite pe-1">
                              <i class="fas fa-calendar-alt"></i>
                            </span>
                            <span class="">
                                {{$page->created_at->format('jS M, Y')}}
                            </span>
                          </div>
                          <div class="col-md-8 text-start text-md-end">
                              @foreach ($page->files as $file)
                              <a class="notice-download" target="_blank" href="{{asset($file->file)}}" class="d-inline-block"> {{$file->title}} <i class="fas fa-download"></i></a>
                                  
                              @endforeach
                          
                          </div>
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
