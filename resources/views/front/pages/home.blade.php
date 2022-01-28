@extends('front.app')
@section('content')
    <div id="home-page">
        <div>
            @include('front.pages.home.slider')
        </div>
        <div class="page-inner">
            <marquee behavior="" direction="" class="mb-3">
                @foreach ($notices as $notice)
                    <div class="d-inline-block me-3" >{{$notice->title}}</div>
                @endforeach    
            </marquee>
            <div class="row shadow m-0">
                <div class="col-md-6 p-0">
                    <div class="home-notices">
                        <div class="title">
                            Latest Notices
                        </div>
                        @foreach ($notices as $notice)
                        <div class="notice">
                            <span class="date">
                                <span class="day">{{$notice->updated_at->format('jS')}}</span>
                                <span class="month">{{$notice->updated_at->format('M')}}</span>
                            </span>
                            <a href="{{route('page',['id'=>$notice->id])}}" >
                                {{$notice->title}}
                                <span class="more">View More</span>
                            </a>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-tabs">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            @php  $i=0; @endphp
                            @foreach ($setting->about_title as $title)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{$i++==0?'active':''}}" id="about-tab" data-bs-toggle="tab"
                                        data-bs-target="#about-{{ $title->id }}" type="button" role="tab"
                                        aria-controls="about" aria-selected="true">{{ $title->title }}</button>
                                </li>
                            @php  $i+=1; @endphp

                            @endforeach
                        </ul>
                        <!-- <hr class="mt-1"> -->
                        <div class="tab-content" id="myTabContent">
                            @foreach ($abouts as $key => $about)
                                <div class="tab-pane fade show {{ $key == 0 ? 'active' : '' }}" id="about-{{ $about->id }}"
                                    role="tabpanel" aria-labelledby="about-{{ $about->id }}-tab">
                                    <p class="content">
                                        {{ $about->short_desc }}
                                    </p>
                                    <div class="view-detail">
                                        <a href="{{ route('page', ['id' => $about->id]) }}">Read More</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="programs">
            <div class="title">Our Programs</div>
            <div class="desc">{{ $setting->program }}</div>
            <div class="row mt-5">
                @foreach ($programs as $program)

                    <div class="col-md-4 col-12 mb-4">
                        <div class="program  h-100">
                            <div class="image">
                                <img class="w-100" src="{{ asset($program->image) }}" alt="">
                            </div>
                            <div class="program-desc px-3 py-3">
                                <h5>{{ $program->title }}</h5>
                                <p>
                                    {{ $program->short_desc }}
                                </p>
                                <a href="{{ route('page', ['id' => $program->id]) }}">View More</a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
        <div class="why">
            <div class="row m-0">
                <div class="col-md-12">
                    <div class="facilities">
                        <div class="title">Why Choose Us</div>
                        <div class="desc">{{ $setting->why }}</div>
                        <div class="contents">
                            <div class="row">
                                @foreach ($facilities as $facility)    
                                    <div class="col-md-3">
                                        <a href="{{route('page.type',['type'=>'fac'])}}" class="facility" >
                                            <img src="{{asset($facility->image)}}" alt="">
                                            <h5>{{$facility->title}}</h5>
                                            <p>{{$facility->short_desc}}</p>
                                        </a>
                                    </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-5 facilities-image p-0">
                    <img src="https://template.hasthemes.com/shiksha/shiksha/assets/img/bg/1.jpg" alt="">
                </div> -->
            </div>
        </div>
        <div class="events" id="home-events">
            <div class="title">Upcomming Events</div>
            <div class="desc">{{ $setting->event }}</div>
            <div class="row">
                @foreach ($events as $event)
                    
                    <div class="col-md-4">
                        <a class="event " href="{{route('event',['id'=>$event->id])}}">
                            <div class="image">
                                <img src="{{asset($event->image)}}"
                                    alt="">
                            </div>
                            <div class="event-desc">
                                <div class="date">

                                    <strong>{{$event->start->format('jS')}} </strong> 
                                    <span class="text-grey">{{$event->start->format('M, Y')}}</span>

                                    @if ($event->start!=$event->end)
                                    -
                                    <strong>{{$event->end->format('jS')}} </strong> 
                                    <span class="text-grey">{{$event->end->format('M, Y')}}</span>
                                    @endif
                                </div>
                                <h5>{{$event->title}}</h5>
                                <p>
                                    {{$event->short_desc}}
                                </p>
                                <div class="d-flex justify-content-between">
                                    <small>
                                        <i class="fas fa-clock text-yellow-lite"></i>
                                        <span class="text-grey pl-1">
                                            {{$event->start_time}} - {{$event->end_time}} 
                                        </span>
                                    </small>
                                    <small>
                                        <i class="fas fa-map-marker-alt text-yellow-lite"></i>
                                        <span class="text-grey pl-1">

                                            {{$event->addr}}
                                        </span>
                                    </small>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="events" id="home-news">
            <div class="title">Latest News</div>
            <div class="desc">{{ $setting->news }}</div>
            <div class="row">
                @foreach ($news as $singleNews)
                    
                <div class="col-md-4">
                    <a class="event " href="{{route('page',['id'=>$singleNews->id])}}">
                        <div class="image">

                            <img src="{{asset($singleNews->image)}}"
                            alt="">
                        </div>
                        <div class="event-desc">
                            <div class="d-flex justify-content-between mb-2 text-grey">
                                <small>{{$singleNews->created_at->format('jS M, y')}}</small>
                                <small>By: Admin</small>
                            </div>
                            <h5>{{$singleNews->title}}</h5>
                            <p>
                               {{$singleNews->short_desc}}
                            </p>
                            <span class="span">
                                View More
                            </span>

                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('front/vendor/owl/owl.carousel.min.js') }}"></script>
    <script>
        const is_mobile=$(window).innerWidth()<426;
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                items: 1
            });

            if(!is_mobile){
                //make program image same
                let sum = 0;
                let count = 0;
                $('.program .image img').each(function(index, element) {
                    sum += $(element).height()
                    count += 1;
                });
                let avg= (sum / count);
                $('.program .image img').css('height',(avg<170?170:avg) + "px");

                sum = 0;
                count = 0;
                $('#home-events .event>img').each(function(index, element) {
                    sum += $(element).height()
                    count += 1;
                });
                 avg= (sum / count);
                $('#home-events .event>img').css('height',(avg<170?170:avg) + "px");

                sum = 0;
                count = 0;
                $('#home-news .event>img').each(function(index, element) {
                    sum += $(element).height()
                    count += 1;
                });
                 avg= (sum / count);
                $('#home-news .event>img').css('height',(avg<170?170:avg) + "px");
            }

        });
    </script>
@endsection
