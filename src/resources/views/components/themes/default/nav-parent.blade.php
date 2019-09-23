@if(  @$hideParent===true)
    <li class="bg-light text-secondary">
        <h3 class="text-center pt-3 pb-3">{{$parentLabel}}</h3>
    </li>
@endif
<li class="nav-item border-0 mb-1"
    @if(!@$isChild) style="border-top:solid 4px #007bff!important;" @endif
>
    @if(!isset($hideParent) || isset($hideParent)  && !$hideParent)
        <a class="nav-link{{active($parentPath)}} d-flex" href="#{{$subMenuId}}"
           data-toggle="collapse" data-target="#{{$subMenuId}}"
           aria-controls="{{$subMenuId}}"
           aria-expanded="false">
            <span class="w-100">{{$parentLabel}}</span>
            <span class="mdi mdi-chevron-down text-right"></span>
        </a>
    @endif
    <ul class="flex-md-column collapse {{showIfCurrent($parentPath)}}" id="{{$subMenuId}}">
        @foreach($navItems as $navItem)
            @if(isset($navItem['parentLabel']))
                @component('components.sidebar.nav-parent',[
                                'parentLabel' => $navItem['parentLabel'],
                                'parentUrl' => $navItem['parentUrl'],
                                'parentPath' => $navItem['parentPath'],
                                'subMenuId' => $navItem['subMenuId'],
                                'navItems' => $navItem['navItems'],
                                'subMenu' => true,
                                'hideParent' => $navItem['hideParent'],
                                'isChild' => true,
                            ])
                @endcomponent
            @else
                @component('components.sidebar.nav-item',[
                    'label' => $navItem['label'],
                    'url' => $navItem['url'],
                    'path' => $navItem['path'],
                    'subMenu' => true
                ])
                @endcomponent
            @endif
        @endforeach
        {{$slot}}
    </ul>
</li>