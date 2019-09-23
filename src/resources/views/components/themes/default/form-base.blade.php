<form action="{{$action}}" method="post"
      @if(@$hasFile==true)
      enctype="multipart/form-data"
        @endif
>
    {{csrf_field()}}
    @if($method != 'post')
        <input type="hidden" name="_method" value="{{$method}}"/>
    @endif
    <div class="row">
        <div class="col-md-8">
            @include($form)
            <div class="form-group row">
                <div class="col-md-6">&nbsp;</div>
                <div class="col-md-6">
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>
</form>