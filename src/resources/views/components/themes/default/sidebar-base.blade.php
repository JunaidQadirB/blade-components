<div class="col-sm-3 col-md-2 pl-0 pr-0 ml-1 mr-1 sidebar-wrapper border-right" style="height: 100vh">
    <nav class="navbar navbar-expand-md navbar-light pl-0 pr-0 ml-0 mr-0 pt-0 sidebar bg-light">
        <div class="container pl-0 pr-0">
            <button class="navbar-toggler btn-primar mb-3 mr-1 ml-1 btn-block" type="button" data-toggle="collapse"
                    data-target="#{{$id}}Sidebar"
                    aria-controls="{{$id}}Sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                Sidebar
            </button>
            <div class="collapse navbar-collapse" id="{{$id}}Sidebar">
                <ul class="nav nav-pills flex-column nav-vertical w-100" >
                    {{ $slot }}
                </ul>
            </div>
        </div>
    </nav>
</div>
