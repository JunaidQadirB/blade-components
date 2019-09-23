<li class="nav-item">
    <a class="nav-link {{  $tab == $id ? 'active' : null }}"
       id="{{$id}}-tab"
       href="{{$url}}" role="tab"
       aria-controls="{{$id}}" aria-selected="{{ $tab == $id }}"
       data-toggle=""
    >{{$label}}</a>
</li>