@if(!in_array($name,$exclude))
    <div class="form-group row">
        @if(is_array($value))
            @if(@$types[$name] == 'image')
                <label class="col-6 col-form-label"><img src="{{$value}}" alt="" width="150"/></label>
            @else
                @foreach($value as $key=>$val)
                    @if($key==0)
                        <label for="{{$name}}" class="col-3 col-form-label"><strong>{{$label}}</strong></label>
                    @else
                        <label for="{{$name}}" class="col-3 col-form-label"></label>
                    @endif
                        <label class="col-7 col-form-label">{{$val}}</label>
                @endforeach
            @endif
        @else
            <label for="{{$name}}" class="col-3 col-form-label"><strong>{{$label}}</strong></label>

            @if(@$types[$name] == 'image')
                <label class="col-6 col-form-label"><img src="{{$value}}" alt="" width="150"/></label>
            @else
                <label class="col-6 col-form-label">{{$value}}</label>
            @endif
        @endif

    </div>
@endif