<div class="form-group row">
    <label for="{{$name1}}" class="{{@$leftCol??'col-sm-6'}} col-form-label text-md-right">{{$label}}</label>
    <div class="{{@$rightCol??'col-sm'}}">
        <div class="input-group">
            @if(isset($prepend1) && strlen(trim($prepend1)) > 0)
                <div class="input-group-prepend">
                    @if($prepend1 != strip_tags($prepend1))
                        {!! $prepend1 !!}
                    @else
                        <span class="input-group-text">{{$prepend1}}</span>
                    @endif
                </div>
            @endif
            <select type="text" class="form-control custom-select {{$errors->has($name1) ? 'is-invalid' : null}}"
                    name="{{$name1}}" id="{{$name1}}"
                    aria-describedby="{{$name1}}HelpId">
                <option value="">Select</option>
                @foreach($options1 as $option)
                    <option
                            {{old($name1, $value1) == $option[$option1ValueKey] ? 'selected' : null}}
                            value="{{$option[$option1ValueKey]}}"
                    >{{$option[$option1TextKey]}}</option>
                @endforeach
            </select>
            @if(isset($append1) && strlen(trim($append1)) > 0)
                <div class="input-group-append">
                    @if($append1 != strip_tags($append1))
                        {!! $append1 !!}
                    @else
                        <span class="input-group-text">{{$append1}}</span>
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
            <select type="text"
                    class="form-control custom-select {{$errors->has($name2) || $errors->has($name2)  ? 'is-invalid' : null}}"
                    name="{{$name2}}" id="{{$name2}}"
                    aria-describedby="{{$name2}}HelpId">
                <option value="">Select</option>
                @foreach($options2 as $option)
                    <option
                            {{old($name2, $value2) == $option[$option2ValueKey] ? 'selected' : null}}
                            value="{{$option[$option2ValueKey]}}"
                    >{{$option[$option2TextKey]}}</option>
                @endforeach
            </select>
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
        @if($errors->has($name1) || $errors->has($name2))
            <small id="{{$name1}}"
                   class="form-text text-danger">
                {{$errors->first($name1)}}
                {{$errors->first($name2)}}
            </small>
        @else
            <small id="{{$name1}}" class="form-text text-muted">
                {{$helpText}}
            </small>
        @endif
    </div>
</div>
