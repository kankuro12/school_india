<div class="header-top">
    <div class="row">
      <div class="col-md-6 tagline">
        {{$curdata['tagline']}}
      </div>
      <div class="col-md-6">
        <div class="links-top">
          <span>
            <a href="mailto:{{$curdata['email']}}"> <i class="fas fa-envelope"></i>         
                {{$curdata['email']}}
            </a>
          </span>
          <span>
            <a href="tel:{{$curdata['phone']}}"> <i class="fas fa-phone"></i> 
                {{$curdata['phone']}}
            </a>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="header-middle">
    <div class="row">
      <div class="col-md-6 logo">
        <img src="{{asset(getSetting('top_logo',true)??'')}}" alt="">
        <h6>
            {{$curdata['name']}}
        </h6>
      </div>
    </div>
  </div>