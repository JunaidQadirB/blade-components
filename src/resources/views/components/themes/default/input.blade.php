<div class="form-group row">
    <label for="{{isset($id)?$id:$name}}" class="{{@$leftCol??'col-sm-6'}} col-form-label text-md-right">{{$label}}</label>
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
                   name="{{$name}}" id="{{isset($id)?$id:$name}}" aria-describedby="{{isset($id)?$id:$name}}HelpId"
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
        </div>

        @if($errors->has($name))
            <small id="{{isset($id)?$id:$name}}HelpId" class="form-text text-danger">{{$errors->first($name)}}</small>
        @else
            <small id="{{isset($id)?$id:$name}}HelpId" class="form-text text-muted">{{$helpText}}</small>
        @endif
    </div>
</div>
