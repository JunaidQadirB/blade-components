<div class="form-group row">
    <label for="{{$name}}" class="{{@$leftCol??'col-sm-6'}} col-form-label text-md-right">{{$label}}</label>
    <div class="{{@$rightCol??'col-sm'}}">
        <div class="input-group">
            @if(isset($prepend) && strlen(trim($prepend)) > 0)
                <div class="input-group-prepend">
                    @if($prepend != strip_tags($prepend))
                        {!! $prepend !!}
                    @else
                        <span class="input-group-text">{{$prepend}}</span>
                    @endif
                </div>
            @endif
            <input class="form-control {{$errors->has($name) ? 'is-invalid' : null}}"
                   type="{{@$type?:'text'}}"
                   name="{{$name}}" id="{{$name}}" aria-describedby="{{$name}}HelpId"
                   value="{{old($name, $value)}}"
                   @if(@$placeholder) placeholder="{{@$placeholder}}" @endif
                   @if(@$pattern) pattern="{{@$pattern}}" @endif
                   @if($type == 'number') step="{{@$step?:1}}" @endif
                   @if($type == 'number') min="{{@$min?:0}}" @endif
                   @if($type == 'number' && isset($max)) max="{{@$max}}" @endif
            />
            @if(isset($append) && strlen(trim($append)) > 0)
                <div class="input-group-append">
                    @if($append != strip_tags($append))
                        {!! $append !!}
                    @else
                        <span class="input-group-text">{{$append}}</span>
                    @endif
                </div>
            @endif
            @if(@$showHyphen!=false)
                <span class="pl-1 pr-1 pt-2">&ndash;</span>
            @endif
            @if(isset($prepend2) && strlen(trim($prepend2)) > 0)
                <div class="input-group-prepend">
                    @if($prepend2 != strip_tags($prepend2))
                        {!! $prepend2 !!}
                    @else
                        <span class="input-group-text">{{$prepend2}}</span>
                    @endif
                </div>
            @endif
            <input class="form-control {{$errors->has($name2) ? 'is-invalid' : null}}"
                   type="{{@$type2?:'text'}}"
                   name="{{$name2}}" id="{{$name2}}" aria-describedby="{{$name2}}HelpId"
                   value="{{old($name2, $value)}}"
                   @if(@$placeholder2) placeholder="{{@$placeholder2}}" @endif
                   @if(@$pattern2) pattern="{{@$pattern2}}" @endif
                   @if($type2 == 'number') step="{{@$step?:1}}" @endif
                   @if($type2 == 'number') min="{{@$min2?:0}}" @endif
                   @if($type2 == 'number' && isset($max2)) max="{{@$max2}}" @endif
            />
            @if(isset($append2) && strlen(trim($append2)) > 0)
                <div class="input-group-append">
                    @if($append2 != strip_tags($append2))
                        {!! $append2 !!}
                    @else
                        <span class="input-group-text">{{$append2}}</span>
                    @endif
                </div>
            @endif
        </div>

        @if($errors->has($name))
            <small id="{{$name}}HelpId" class="form-text text-danger">{{$errors->first($name)}}</small>
        @else
            <small id="{{$name}}HelpId" class="form-text text-muted">{{$helpText}}</small>
        @endif
    </div>
</div>
