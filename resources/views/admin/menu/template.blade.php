<div class="header-bottom">
    @foreach ($menus as $menu)
        @if ($menu->is_header)
        <div class="dropdown nav-item">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="menu-{{$menu->id}}"
              data-bs-toggle="dropdown" aria-expanded="false">
              {{$menu->name}}
            </button>
            <ul class="dropdown-menu" aria-labelledby="menu-{{$menu->id}}">
                @foreach ($menu->childs() as $child)
                    <li><a class="dropdown-item" href="{{$child->link}}">{{$child->name}}</a></li>
                @endforeach
            
            </ul>
          </div>
        @else
        <span class="nav-item">
            <a href="{{$menu->link}}">{{$menu->name}}</a>
        </span>
        
        @endif
    @endforeach
    
  </div>