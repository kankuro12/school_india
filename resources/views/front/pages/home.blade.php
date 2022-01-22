@extends('front.layout.app')
@section('content')
    <div id="home-page">
        <div>
            <div class="owl-carousel owl-theme owl-home">
                <div class="item">
                    <div class="inner">
                        <h5>title text</h5>
                        <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores sequi debitis eveniet,
                            molestiae
                            reprehenderit?</h6>
                        <a href="">Some Link</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="page-inner">
            <div class="row shadow m-0">
                <div class="col-md-6 p-0">
                    <div class="home-notices">
                        <div class="title">
                            Latest Notices
                        </div>
                        <a href="//google.com" class="notice">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae itaque voluptatem commodi
                            corporis placeat
                            illo <span class="more">View More</span>
                        </a>
                        <a class="notice">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae itaque voluptatem commodi
                            corporis placeat
                            illo
                        </a>
                        <a class="notice">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae itaque voluptatem commodi
                            corporis placeat
                            illo
                        </a>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-tabs">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">Profile</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#contact" type="button" role="tab" aria-controls="contact"
                                    aria-selected="false">Contact</button>
                            </li>
                        </ul>
                        <!-- <hr class="mt-1"> -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <p class="content">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque quisquam odio libero
                                    quasi praesentium
                                    nobis aliquam omnis possimus ipsa eos totam, porro corrupti officia beatae, earum
                                    obcaecati a
                                    exercitationem! Cumque?
                                </p>
                                <div class="view-detail">
                                    <a href="">Read More</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Lorem
                                ipsum, dolor
                                sit amet consectetur adipisicing elit. Inventore facere amet earum fuga sint ea, nemo odio
                                sed tempore
                                sequi cum placeat iste, beatae repudiandae maiores cupiditate. A, doloribus alias.</div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Lorem
                                ipsum dolor
                                sit amet, consectetur adipisicing elit. Deleniti ipsa quasi sit praesentium consectetur
                                alias vel
                                placeat, saepe similique expedita commodi qui minima eaque obcaecati suscipit natus!
                                Debitis, esse
                                dolorem!</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="programs">
            <div class="title">Our Programs</div>
            <div class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit magnam
                repudiandae
                accusantium odit? Error deleniti, sequi laborum veritatis ab ad dolor labore neque tenetur animi? Officia
                quaerat rem iste consequuntur.</div>
            <div class="row mt-5">
                <div class="col-md-4 col-12 mb-5">
                    <div class="program shadow">
                        <div class="image">
                            <img class="w-100"
                                src="https://images.unsplash.com/photo-1453728013993-6d66e9c9123a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8dmlzaW9ufGVufDB8fDB8fA%3D%3D&w=1000&q=80"
                                alt="">
                        </div>
                        <div class="program-desc px-3 py-3">
                            <h5>Civil Engenrring</h5>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil soluta harum nulla
                                recusandae labore,
                                nobis neque tenetur repudiandae,
                            </p>
                            <a>View More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="why">
            <div class="row m-0">
                <div class="col-md-12">
                    <div class="facilities">
                        <div class="title">Why Choose Us</div>
                        <div class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente
                            adipisci officiis ullam
                            nam praesentium voluptatibus recusandae commodi.</div>
                        <div class="contents">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="facility">
                                        <img src="https://icon-library.com/images/icon-50x50/icon-50x50-2.jpg" alt="">
                                        <h5>Wifi</h5>
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus saepe,
                                            accusamus a ab nulla
                                            tenetur tempora harum tempore</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="facility">
                                        <img src="https://icon-library.com/images/icon-50x50/icon-50x50-2.jpg" alt="">
                                        <h5>Wifi</h5>
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus saepe,
                                            accusamus a ab nulla
                                            tenetur tempora harum tempore</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="facility">
                                        <img src="https://icon-library.com/images/icon-50x50/icon-50x50-2.jpg" alt="">
                                        <h5>Wifi</h5>
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus saepe,
                                            accusamus a ab nulla
                                            tenetur tempora harum tempore</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="facility">
                                        <img src="https://icon-library.com/images/icon-50x50/icon-50x50-2.jpg" alt="">
                                        <h5>Wifi</h5>
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus saepe,
                                            accusamus a ab nulla
                                            tenetur tempora harum tempore</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-5 facilities-image p-0">
                <img src="https://template.hasthemes.com/shiksha/shiksha/assets/img/bg/1.jpg" alt="">
            </div> -->
            </div>
        </div>
        <div class="events">
            <div class="title">Upcomming Events</div>
            <div class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit magnam
                repudiandae
                accusantium odit? Error deleniti, sequi laborum veritatis ab ad dolor labore neque tenetur animi? Officia
                quaerat rem iste consequuntur.</div>
            <div class="row">
                <div class="col-md-4">
                    <a class="event shadow">
                        <img src="https://images.unsplash.com/photo-1453728013993-6d66e9c9123a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8dmlzaW9ufGVufDB8fDB8fA%3D%3D&w=1000&q=80"
                            alt="">
                        <div class="event-desc">
                            <div class="date">
                                <strong>16th </strong> <span class="text-grey">Oct ,2017</span>
                            </div>
                            <h5>Motivational Workshop for Gender discrimination</h5>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis rerum ducimus saepe
                                commodi.
                                Aspernatur blanditiis, similique iure impedit distinctio quam porro dolorem voluptatum
                                eligendi
                                temporibus cumque natus! Magnam, hic molestias.
                            </p>
                            <div class="d-flex justify-content-between">
                                <small>
                                    <i class="fas fa-clock text-yellow-lite"></i>
                                    <span class="text-grey pl-1">
                                        9pm - 10am
                                    </span>
                                </small>
                                <small>
                                    <i class="fas fa-map-marker-alt text-yellow-lite"></i>
                                    <span class="text-grey pl-1">

                                        Puset Lab
                                    </span>
                                </small>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="events">
            <div class="title">Latest News</div>
            <div class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit magnam
                repudiandae
                accusantium odit? Error deleniti, sequi laborum veritatis ab ad dolor labore neque tenetur animi? Officia
                quaerat rem iste consequuntur.</div>
            <div class="row">
                <div class="col-md-4">
                    <a class="event shadow">
                        <img src="https://images.unsplash.com/photo-1453728013993-6d66e9c9123a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8dmlzaW9ufGVufDB8fDB8fA%3D%3D&w=1000&q=80"
                            alt="">
                        <div class="event-desc">
                            <div class="d-flex justify-content-between mb-2 text-grey">
                                <small>16th Oct ,2017</small>
                                <small>By: Chhatraman Shrestha</small>
                            </div>
                            <h5>Motivational Workshop for Gender discrimination</h5>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis rerum ducimus saepe
                                commodi.
                                Aspernatur blanditiis, similique iure impedit distinctio quam porro dolorem voluptatum
                                eligendi
                                temporibus cumque natus! Magnam, hic molestias.
                            </p>
                            <span class="span">
                                View More
                            </span>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{asset('front/vendor/owl/owl.carousel.min.js')}}"></script>
<script>
  $(document).ready(function () {
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 0,
      nav: true,
      items: 1
    });
  });
</script>
@endsection
