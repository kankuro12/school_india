<div class="footer">
    <div class="footer-inner">
      <div class="row">
        <div class="col-md-3">
            <div class="footer-element">
              <div class="title">
                About {{$footer1->title}}
              </div>
              <div class="inner">
                <div>
                    {{$footer1->desc}}
                </div>
                <ul class="mt-3">
                    @foreach ($footer1->links as $link)
                        <li>
                            <a href="{{$link->title}}">
                                {{$link->link}} 
                            </a>
                        </li>          
                    @endforeach
                </ul>
              </div>
             
              
            </div>
        </div>
        <div class="col-md-2">
          <div class="footer-element ps-0 ps-md-3">
            <div class="title">
              Quick Links
            </div>
            <div class="inner">
              <ul class="footer-list">
                @foreach ($footer2 as $link)
                <li>
                        <a href="{{$link->title}}">
                            {{$link->link}} 
                        </a>
                    </li>          
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="footer-element ps-0 ps-md-3">
            <div class="title">
             Important Links
            </div>
            <div class="inner">
              <ul class="footer-list">
                @foreach ($footer2 as $link)
                    <li>
                        <a href="{{$link->title}}">
                            {{$link->link}} 
                        </a>
                    </li>          
                @endforeach
                
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4  p-0">
          <div class="footer-element no">
            <div class="gmap_canvas">
              <iframe  id="gmap_canvas"
              src="https://maps.google.com/maps?q={{$footer4}}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
              scrolling="no" marginheight="0" marginwidth="0"></iframe>
        
            </div>
          </div>
        </div>

      </div>
      <hr>
      <div class="row">
        <div class="col-md-6 mb-2">
          <div class="social-links d-flex justify-content-center justify-content-md-start align-items-center">
            <a href="https://www.facebook.com/puschoolofengineering" class="social-link" target="_blank">
              <i class="fab fa-facebook-f"></i>
            </a>
          </div>
        </div>
        <div class="col-md-6  d-flex justify-content-center justify-content-md-end align-items-center">
            
          @copyright all
        </div>
      </div>
    </div>
  </div>