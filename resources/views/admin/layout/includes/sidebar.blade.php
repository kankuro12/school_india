<div class="page-sidebar">
    <div class="logo-box"><a href="#" class="logo-text">{{env('APP_NAME','')}}</a><a href="#" id="sidebar-close"><i class="material-icons">close</i></a> <a href="#" id="sidebar-state"><i class="material-icons">adjust</i><i class="material-icons compact-sidebar-icon">panorama_fish_eye</i></a></div>
    <div class="page-sidebar-inner slimscroll">
        <ul class="accordion-menu" id="accordion-menu">

            <li>
                <a href="/">
                    <i class="material-icons">dashboard</i>
                    dashboard
                </a>

            </li>

            <li >
                <a href="#"><i class="material-icons">supervisor_account</i>HR<i class="material-icons has-sub-menu">add</i></a>
                <ul class="sub-menu">
                    {{-- {{-- <li class="sub-item">
                        <a  href="{{route('admin.setting.category.index')}}" >Services</a>
                    </li> --}}
                    <li class="sub-item">
                        <a  href="{{route('admin.employee.index')}}" >Employees</a>
                    </li>
                </ul>
            </li>
            <li >
                <a href="#"><i class="material-icons">settings</i>Settings<i class="material-icons has-sub-menu">add</i></a>
                <ul class="sub-menu">
                    <li class="sub-item">
                        <a  href="{{route('admin.setting.level.index')}}" >Level</a>
                    </li>
                    <li class="sub-item">
                        <a  href="{{route('admin.setting.academicyear.index')}}" >Academic Years</a>
                    </li>
                    <li class="sub-item">
                        <a  href="{{route('admin.setting.caste')}}" >Caste</a>
                    </li>
                    <li class="sub-item">
                        <a  href="{{route('admin.setting.religion')}}" >Religions</a>
                    </li>
                    <li class="sub-item">
                        <a  href="{{route('admin.setting.category')}}" >Categories</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
