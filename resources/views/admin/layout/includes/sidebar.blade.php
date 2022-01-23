<div class="page-sidebar">
    <div class="logo-box"><a href="#" class="logo-text">{{env('APP_NAME','')}}</a><a href="#" id="sidebar-close"><i class="material-icons">close</i></a> <a href="#" id="sidebar-state"><i class="material-icons">adjust</i><i class="material-icons compact-sidebar-icon">panorama_fish_eye</i></a></div>
    <div class="page-sidebar-inner slimscroll">
        <ul class="accordion-menu" id="accordion-menu">

            <li>
                <a href="{{route('admin.dashboard.index')}}">
                    <i class="material-icons">dashboard</i>
                    dashboard
                </a>

            </li>

            
            @foreach (\App\Data::pageTypes as $key=>$pagetype)
            <li >
                <a href="#">
                    <i class="material-icons">settings</i>
                    {{$pagetype[1]}}
                    <i class="material-icons has-sub-menu">add</i>
                </a>
                <ul class="sub-menu">
                    <li class="sub-item">
                        <a  href="{{route('admin.page.add',['type'=>$key])}}" >Add {{$pagetype[0]}}</a>
                    </li>
                    <li class="sub-item">
                        <a  href="{{route('admin.page.index',['type'=>$key])}}" >List {{$pagetype[1]}}</a>
                    </li>
                  
                </ul>
            </li>
            @endforeach

            <li >
                <a href="#">
                    <i class="material-icons">settings</i>
                    Front Setting
                    <i class="material-icons has-sub-menu">add</i>
                </a>
                <ul class="sub-menu">
                    <li class="sub-item">
                        <a  href="{{route('admin.setting.index',['type'=>'top'])}}" >Header</a>
                    </li>
                    <li class="sub-item">
                        <a  href="{{route('admin.menu.index')}}" >Menus</a>
                    </li>
                    <li class="sub-item">
                        <a  href="{{route('admin.setting.slider.index')}}" >sliders</a>
                    </li>
                    <li class="sub-item">
                        <a  href="{{route('admin.setting.footer.index')}}" >Footer</a>
                    </li>
                </ul>
            </li>
        </ul>
        <br>
        <br>
    </div>
</div>
